<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index()
    {
        $query = Order::with(['user', 'items.product']);
        if (request()->filled('order_search')) {
            $search = request('order_search');
            $query->where(function($q) use ($search) {
                $q->where('order_number', 'like', "%$search%")
                  ->orWhereHas('user', function($uq) use ($search) {
                      $uq->where('name', 'like', "%$search%")
                         ->orWhere('email', 'like', "%$search%")
                         ->orWhere('phone', 'like', "%$search%")
                         ;
                  })
                  ->orWhereHas('items.product', function($pq) use ($search) {
                      $pq->where('name', 'like', "%$search%")
                         ->orWhere('slug', 'like', "%$search%")
                         ;
                  });
            });
        }
        $orders = $query->orderBy('created_at', 'desc')->paginate(10)->appends(request()->all());
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load('user', 'items', 'items.product', 'deliveryAgent');
        return view('admin.orders.show', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,completed,cancelled,refund_initiated,refunded',
        ]);


        $oldStatus = $order->status;
        $order->update($validated);

        // Add timeline entry if status changed
        if ($oldStatus !== $validated['status']) {
            // Remove any existing timeline event for this status and order
            \App\Models\OrderTimeline::where('order_id', $order->id)
                ->where('status', $validated['status'])
                ->delete();

            \App\Models\OrderTimeline::create([
                'order_id' => $order->id,
                'status' => $validated['status'],
                'changed_at' => now(),
                'note' => 'Status updated by admin',
            ]);
        }

        return redirect()->route('admin.orders.show', $order)->with('success', 'Order status updated successfully!');
    }
}
