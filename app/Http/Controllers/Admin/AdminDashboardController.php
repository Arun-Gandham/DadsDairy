<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
     * Show admin dashboard
     */
    public function dashboard()
    {
        $totalUsers      = User::count();
        $totalProducts   = Product::count();
        $totalOrders     = Order::count();
        $totalCategories = Category::count();
        $totalRevenue    = Order::where('status', 'delivered')->sum('total_amount');

        $recentOrders = Order::with('user', 'items.product')
            ->latest()
            ->limit(10)
            ->get();

        $topProducts = Product::withCount('orderItems')
            ->orderBy('order_items_count', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalProducts',
            'totalOrders',
            'totalCategories',
            'totalRevenue',
            'recentOrders',
            'topProducts'
        ));
    }

    /**
     * Show products list
     */
    public function products()
    {
        $products = Product::with('category')->paginate(15);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show create product form
     */
    public function createProduct()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store product
     */
    public function storeProduct(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'quantity'    => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image'       => 'nullable|image|max:2048',
            'is_active'   => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $path               = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        }

        $validated['slug'] = \Str::slug($validated['name']);
        Product::create($validated);

        return redirect()->route('admin.products')->with('success', 'Product created successfully');
    }

    /**
     * Show edit product form
     */
    public function editProduct(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update product
     */
    public function updateProduct(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'quantity'    => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image'       => 'nullable|image|max:2048',
            'is_active'   => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $path               = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        }

        $validated['slug'] = \Str::slug($validated['name']);
        $product->update($validated);

        return redirect()->route('admin.products')->with('success', 'Product updated successfully');
    }

    /**
     * Delete product
     */
    public function deleteProduct(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products')->with('success', 'Product deleted successfully');
    }

    /**
     * Show orders list
     */
    public function orders()
    {
        $orders = Order::with('user', 'items.product')
            ->latest()
            ->paginate(15);
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show order details
     */
    public function showOrder(Order $order)
    {
        $order->load('user', 'items.product', 'deliveryAgent');
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Update order status
     */
    public function updateOrderStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status'            => 'required|in:pending,processing,shipped,delivered,cancelled',
            'delivery_agent_id' => 'nullable|exists:users,id',
        ]);

        $order->update($validated);

        return redirect()->back()->with('success', 'Order status updated successfully');
    }

    /**
     * Show users list
     */
    public function users()
    {
        $users = User::with('role')->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show categories list
     */
    public function categories()
    {
        $categories = Category::withCount('products')->paginate(15);
        return view('admin.categories.index', compact('categories'));
    }
}
