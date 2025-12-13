<?php

namespace App\Services\Delhivery;

use Illuminate\Support\Facades\Http;

class DelhiveryService
{
    protected $apiToken;
    protected $baseUrl;
    protected $originPin;

    public function __construct()
    {
        $this->apiToken = config('services.delhivery.token');
        $this->baseUrl = config('services.delhivery.base_url', 'https://staging-express.delhivery.com');
        $this->originPin = config('services.delhivery.origin_pin');
    }

    // Returns all available shipping options (standard, express, etc.) for checkout
    public function getAllShippingOptions($destinationPin, $weight = 10, $state = null)
    {
        // Only require valid 6-digit pincode
        if (!$destinationPin || !preg_match('/^\d{6}$/', $destinationPin)) {
            return null; // Invalid pincode
        }

        // Get rates for standard delivery (Pre-paid)
        $rates = $this->getRates($destinationPin, $weight, 'Pre-paid');
        $shippingCost = null;
        $eta = null;
        // Delhivery API may return different structures, check for standard delivery
        if (isset($rates['total_amount'])) {
            $shippingCost = $rates['total_amount'];
            $eta = $rates['expected_delivery_date'] ?? null;
        } elseif (isset($rates[0]['total_amount'])) {
            $shippingCost = $rates[0]['total_amount'];
            $eta = $rates[0]['expected_delivery_date'] ?? null;
        }

        // If no standard delivery, return nothing
        if ($shippingCost === null) {
            return [];
        }

        // Option 1: Prepaid (free delivery, cost included in product)
        $options[] = [
            'service_type' => 'Prepaid (Free Delivery)',
            'price' => 0,
            'estimated_delivery_date' => $eta,
            'cod_charge' => 0,
        ];
        // Option 2: COD (customer pays standard shipping)
        $options[] = [
            'service_type' => 'COD (Standard Shipping)',
            'price' => $shippingCost,
            'estimated_delivery_date' => $eta,
            'cod_charge' => $shippingCost,
        ];
        return $options;
    }

    // Check if a pincode is serviceable by Delhivery
    public function isServiceable($destinationPin)
    {
        $url = $this->baseUrl . '/api/cms/pin-codes/json/?filter_codes=' . $destinationPin;
        $response = Http::withHeaders($this->headers())->get($url);
        $json = $response->json();
        \Log::info('Delhivery isServiceable response', [
            'url' => $url,
            'destinationPin' => $destinationPin,
            'body' => $json,
        ]);
        // Robust check: if delivery_codes exists and has at least one entry
        if (isset($json['delivery_codes'][0]['postal_code'])) {
            $postal = $json['delivery_codes'][0]['postal_code'];
            $prepaid = $postal['pre_paid'] ?? 'N';
            $cod = $postal['cod'] ?? 'N';
            // If either is Y, it's serviceable
            if ($prepaid === 'Y' || $cod === 'Y') {
                return true;
            }
            // Fallback: if the pincode exists in the response, consider it serviceable (optional, comment out if not desired)
            // return true;
        }
        return false;
    }
    public function generateToken()
    {
        // If Delhivery provides a token generation endpoint, implement here
        // Otherwise, use static token from config
        return $this->apiToken;
    }

    public function checkApi()
    {
        $response = Http::withHeaders($this->headers())
            ->get($this->baseUrl . '/api/cms/settings');
        return $response->json();
    }

    public function getRates($destinationPin, $weight = 250, $paymentType = 'Pre-paid')
    {
        $url = $this->baseUrl . '/api/kinko/v1/invoice/charges/.json';
        $params = [
            'md' => 'E',
            'ss' => 'Delivered',
            'd_pin' => $destinationPin,
            'o_pin' => $this->originPin,
            'cgm' => $weight,
            'pt' => $paymentType,
        ];
        $response = Http::withHeaders($this->headers())
            ->get($url, $params);
        $json = $response->json();
        \Log::info('Delhivery getRates response', [
            'url' => $url,
            'params' => $params,
            'status' => $response->status(),
            'body' => $json,
            'token' => $this->apiToken,
        ]);
        return $json;
    }

    public function getStatus($waybill)
    {
        $url = $this->baseUrl . "/api/v1/packages/json/?waybill=$waybill";
        $response = Http::withHeaders($this->headers())
            ->get($url);
        return $response->json();
    }

    public function createShipment($data)
    {
        $url = $this->baseUrl . '/api/cmu/create.json';
        $response = Http::withHeaders($this->headers())
            ->post($url, $data);
        return $response->json();
    }

    public function updateShipment($waybill, $data)
    {
        $url = $this->baseUrl . "/api/v1/packages/update/$waybill";
        $response = Http::withHeaders($this->headers())
            ->put($url, $data);
        return $response->json();
    }

    public function cancelShipment($waybill)
    {
        $url = $this->baseUrl . "/api/p/edit";
        $response = Http::withHeaders($this->headers())
            ->post($url, [
                'waybill' => $waybill,
                'status' => 'Cancelled',
            ]);
        return $response->json();
    }

    protected function headers()
    {
        return [
            'Content-Type' => 'application/json',
            'Authorization' => 'Token ' . $this->apiToken,
        ];
    }
}
