<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'slug'        => 'required|string|max:255|unique:products,slug',
            'type'        => 'required|in:buy,subscribe,both',
            'description' => 'nullable|string',
            'details'     => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'quantity'    => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active'   => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        }

        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $images[] = $img->store('products', 'public');
            }
        }
        $validated['images'] = $images;

        Product::create($validated);

        return redirect()->route('admin.products')->with('success', 'Product created successfully!');
    }


    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'details'     => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'quantity'    => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active'   => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        }

        $images = $product->images ?? [];
        // Remove images marked for deletion
        if ($request->has('delete_images')) {
            foreach ($request->input('delete_images') as $idx => $action) {
                if ($action === 'delete' && isset($images[$idx])) {
                    \Storage::disk('public')->delete($images[$idx]);
                    unset($images[$idx]);
                }
            }
            $images = array_values($images);
        }
        // Add new images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $images[] = $img->store('products', 'public');
            }
        }
        // Reorder images if order is provided
        if ($request->filled('images_order')) {
            $order = json_decode($request->input('images_order'), true);
            if (is_array($order)) {
                // Only keep images that exist in $images and in the order provided
                $images = array_values(array_filter($order, function($img) use ($images) {
                    return in_array($img, $images);
                }));
                // Add any images not in the order to the end
                foreach ($images as $img) {
                    if (!in_array($img, $order)) {
                        $images[] = $img;
                    }
                }
            }
        }
        $validated['images'] = $images;

        $product->update($validated);

        return redirect()->route('admin.products')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products')->with('success', 'Product deleted successfully!');
    }
}
