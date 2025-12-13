<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Delhivery\DelhiveryService;

class DelhiveryController extends Controller
{
    protected $delhivery;
    
    public function __construct(DelhiveryService $delhivery)
    {
        $this->delhivery = $delhivery;
    }
    // Returns all available shipping options for checkout (standard, express, etc.)
    public function getShippingOptions(Request $request)
    {
        $request->validate([
            'd_pin' => 'required',
            'weight' => 'nullable|numeric',
        ]);
        $d_pin = $request->d_pin;
        $state = $request->state ?? null;
        // Validate pincode (should be 6 digits)
        if (!$d_pin || !preg_match('/^\d{6}$/', $d_pin)) {
            return response()->json(['status' => 'incomplete', 'message' => 'Fill the address to see the delivery options'], 200);
        }
        $options = $this->delhivery->getAllShippingOptions($d_pin, $request->input('weight', 1000), $state);
        // If no options, return empty array (no error message)
        if (!$options || count($options) === 0) {
            return response()->json(['status' => 'ok', 'options' => []], 200);
        }
        return response()->json(['status' => 'ok', 'options' => $options], 200);
    }

    public function checkApi()
    {
        return response()->json($this->delhivery->checkApi());
    }

    public function getRates(Request $request)
    {
        $request->validate([
            'd_pin' => 'required',
            'weight' => 'nullable|numeric',
            'pt' => 'nullable|string',
        ]);
        $rates = $this->delhivery->getRates(
            $request->d_pin,
            $request->input('weight', 10),
            $request->input('pt', 'Pre-paid')
        );
        return response()->json($rates);
    }

    public function getStatus(Request $request)
    {
        $request->validate(['waybill' => 'required']);
        $status = $this->delhivery->getStatus($request->waybill);
        return response()->json($status);
    }

    public function createShipment(Request $request)
    {
        $shipment = $this->delhivery->createShipment($request->all());
        return response()->json($shipment);
    }

    public function updateShipment(Request $request)
    {
        $request->validate(['waybill' => 'required']);
        $update = $this->delhivery->updateShipment($request->waybill, $request->except('waybill'));
        return response()->json($update);
    }

    public function cancelShipment(Request $request)
    {
        $request->validate(['waybill' => 'required']);
        $cancel = $this->delhivery->cancelShipment($request->waybill);
        return response()->json($cancel);
    }
}
