<?php
namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryDashboardController extends Controller
{
    /**
     * Show delivery agent dashboard
     */
    public function dashboard()
    {
        $user               = Auth::user();
        $assignedDeliveries = Order::where('delivery_agent_id', $user->id)
            ->whereIn('status', ['processing', 'shipped'])
            ->count();

        $completedDeliveries = Order::where('delivery_agent_id', $user->id)
            ->where('status', 'delivered')
            ->count();

        $pendingDeliveries = Order::where('delivery_agent_id', $user->id)
            ->where('status', 'processing')
            ->get();

        $completedToday = Order::where('delivery_agent_id', $user->id)
            ->where('status', 'delivered')
            ->whereDate('delivered_at', today())
            ->count();

        return view('delivery.dashboard', compact(
            'assignedDeliveries',
            'completedDeliveries',
            'pendingDeliveries',
            'completedToday'
        ));
    }

    /**
     * Show deliveries list
     */
    public function deliveries()
    {
        $deliveries = Order::where('delivery_agent_id', Auth::id())
            ->with('user', 'items.product')
            ->latest()
            ->paginate(15);

        return view('delivery.deliveries.index', compact('deliveries'));
    }

    /**
     * Show delivery details
     */
    public function showDelivery(Order $order)
    {
        if ($order->delivery_agent_id !== Auth::id()) {
            abort(403);
        }

        $order->load('user', 'items.product');
        return view('delivery.deliveries.show', compact('order'));
    }

    /**
     * Update delivery status
     */
    public function updateDeliveryStatus(Request $request, Order $order)
    {
        if ($order->delivery_agent_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'status' => 'required|in:processing,shipped,delivered',
            'notes'  => 'nullable|string',
        ]);

        $data = ['status' => $validated['status']];

        if ($validated['status'] === 'delivered') {
            $data['delivered_at'] = now();
        }

        $order->update($data);

        return redirect()->back()->with('success', 'Delivery status updated successfully');
    }
}
