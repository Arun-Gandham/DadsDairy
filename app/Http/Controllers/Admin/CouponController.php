<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index()
    {
        $coupons = Coupon::paginate(10);
        return view('admin.coupons.index', compact('coupons'));
    }

    public function create()
    {
        $products = Product::all();
        $users = \App\Models\User::all();
        return view('admin.coupons.create', compact('products', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code'                   => 'required|string|unique:coupons,code|max:50',
            'description'            => 'nullable|string',
            'discount_type'          => 'required|in:fixed,percentage',
            'discount_value'         => 'required|numeric|min:0',
            'max_uses'               => 'nullable|integer|min:1',
            'usage_per_user'         => 'required|integer|min:1',
            'applicable_to'          => 'required|in:all,first_order_only,subscription_only,specific_products,special_users',
            'applicable_product_ids' => 'nullable|array',
            'valid_from'             => 'nullable|date',
            'valid_till'             => 'nullable|date|after_or_equal:valid_from',
            'min_order_value'        => 'nullable|numeric|min:0',
            'is_active'              => 'nullable|boolean',
        ]);

        $validated['is_active']              = $request->has('is_active');
        $validated['applicable_product_ids'] = $request->applicable_to === 'specific_products'
            ? $request->applicable_product_ids
            : null;

        // Ensure min_order_value is never null
        if (!isset($validated['min_order_value']) || $validated['min_order_value'] === null) {
            $validated['min_order_value'] = 0;
        }

        $coupon = Coupon::create($validated);
        // Sync users if provided
        if ($request->has('user_ids')) {
            $coupon->users()->sync($request->user_ids);
        }
        return redirect()->route('admin.coupons.index')->with('success', 'Coupon created successfully!');
    }

    public function edit(Coupon $coupon)
    {
        $products = Product::all();
        $users = \App\Models\User::all();
        $selectedUserIds = $coupon->users()->pluck('user_id')->toArray();
        return view('admin.coupons.edit', compact('coupon', 'products', 'users', 'selectedUserIds'));
    }

    public function update(Request $request, Coupon $coupon)
    {
        $validated = $request->validate([
            'code'                   => 'required|string|unique:coupons,code,' . $coupon->id . '|max:50',
            'description'            => 'nullable|string',
            'discount_type'          => 'required|in:fixed,percentage',
            'discount_value'         => 'required|numeric|min:0',
            'max_uses'               => 'nullable|integer|min:1',
            'usage_per_user'         => 'required|integer|min:1',
            'applicable_to'          => 'required|in:all,first_order_only,subscription_only,specific_products,special_users',
            'applicable_product_ids' => 'nullable|array',
            'valid_from'             => 'nullable|date',
            'valid_till'             => 'nullable|date|after_or_equal:valid_from',
            'min_order_value'        => 'nullable|numeric|min:0',
            'is_active'              => 'nullable|boolean',
        ]);

        $validated['is_active']              = $request->has('is_active');
        $validated['applicable_product_ids'] = $request->applicable_to === 'specific_products'
            ? $request->applicable_product_ids
            : null;

        $coupon->update($validated);
        // Sync users if provided
        if ($request->has('user_ids')) {
            $coupon->users()->sync($request->user_ids);
        } else {
            $coupon->users()->sync([]);
        }
        return redirect()->route('admin.coupons.index')->with('success', 'Coupon updated successfully!');
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('admin.coupons.index')->with('success', 'Coupon deleted successfully!');
    }
}
