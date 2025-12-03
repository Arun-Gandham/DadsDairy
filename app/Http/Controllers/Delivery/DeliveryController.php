<?php
namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:delivery_agent');
    }

    public function index()
    {
        $user       = auth()->user();
        $deliveries = Order::where('delivery_agent_id', $user->id)
            ->whereIn('status', ['pending', 'processing', 'shipped'])
            ->with('user', 'items')
            ->get();

        $pending_count   = $deliveries->filter(fn($o) => $o->status !== 'completed')->count();
        $completed_count = Order::where('delivery_agent_id', $user->id)
            ->where('status', 'completed')
            ->count();

        return view('delivery.deliveries.index', compact('deliveries', 'pending_count', 'completed_count'));
    }

    public function show(Order $order)
    {
        $this->authorize('view', $order);
        $order->load('user', 'items', 'items.product');
        return view('delivery.deliveries.show', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $this->authorize('update', $order);

        $validated = $request->validate([
            'status' => 'required|in:pending,shipped,completed,cancelled',
            'notes'  => 'nullable|string',
        ]);

        $order->update($validated);

        return redirect()->route('delivery.deliveries.show', $order)->with('success', 'Delivery status updated successfully!');
    }
}
