<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Customer\CustomerDashboardController;
use App\Http\Controllers\Delivery\DeliveryController;
use App\Http\Controllers\Delivery\DeliveryDashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // Redirect authenticated users to their dashboard
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Dashboard Route
Route::get('/dashboard', function () {
    $user = auth()->user();
    if ($user->hasRole('admin')) {
        return redirect()->route('admin.dashboard');
    } elseif ($user->hasRole('delivery_agent')) {
        return redirect()->route('delivery.dashboard');
    }
    return redirect()->route('customer.dashboard');
})->middleware('auth')->name('dashboard');

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
        // Roles
        Route::get('/roles', [\App\Http\Controllers\Admin\RoleController::class, 'index'])->name('admin.roles.index');
        Route::get('/roles/create', [\App\Http\Controllers\Admin\RoleController::class, 'create'])->name('admin.roles.create');
        Route::post('/roles', [\App\Http\Controllers\Admin\RoleController::class, 'store'])->name('admin.roles.store');
        Route::get('/roles/{role}/edit', [\App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('admin.roles.edit');
        Route::put('/roles/{role}', [\App\Http\Controllers\Admin\RoleController::class, 'update'])->name('admin.roles.update');
        Route::delete('/roles/{role}', [\App\Http\Controllers\Admin\RoleController::class, 'destroy'])->name('admin.roles.destroy');
        Route::post('/roles/{role}/toggle', [\App\Http\Controllers\Admin\RoleController::class, 'toggle'])->name('admin.roles.toggle');
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');

    // Products
    Route::get('/products', [AdminProductController::class, 'index'])->name('admin.products');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [AdminProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{product}', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');

    // Orders
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders');
    Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('admin.orders.show');
    Route::put('/orders/{order}', [AdminOrderController::class, 'update'])->name('admin.orders.update');

    // Users
    Route::get('/users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users');
    Route::get('/users/create', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/{user}/edit', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.users.update');
    Route::post('/users/{user}/toggle', [\App\Http\Controllers\Admin\UserController::class, 'toggle'])->name('admin.users.toggle');

    // Categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    // Coupons
    Route::get('/coupons', [CouponController::class, 'index'])->name('admin.coupons.index');
    Route::get('/coupons/create', [CouponController::class, 'create'])->name('admin.coupons.create');
    Route::post('/coupons', [CouponController::class, 'store'])->name('admin.coupons.store');
    Route::get('/coupons/{coupon}/edit', [CouponController::class, 'edit'])->name('admin.coupons.edit');
    Route::put('/coupons/{coupon}', [CouponController::class, 'update'])->name('admin.coupons.update');
    Route::delete('/coupons/{coupon}', [CouponController::class, 'destroy'])->name('admin.coupons.destroy');

    // Permissions
    Route::get('/permissions', [PermissionController::class, 'index'])->name('admin.permissions.index');
    Route::post('/permissions', [PermissionController::class, 'store'])->name('admin.permissions.store');
    Route::post('/permissions/{role}', [PermissionController::class, 'assignPermissions'])->name('admin.permissions.assign');

    // Subscriptions
    Route::get('/subscriptions', [\App\Http\Controllers\Admin\SubscriptionController::class, 'index'])->name('admin.subscriptions.index');
    Route::get('/subscriptions/{subscription}', [\App\Http\Controllers\Admin\SubscriptionController::class, 'show'])->name('admin.subscriptions.show');
    Route::put('/subscriptions/{subscription}', [\App\Http\Controllers\Admin\SubscriptionController::class, 'update'])->name('admin.subscriptions.update');

    // Reports
    Route::get('/reports', function() {
        return view('admin.reports.index');
    })->name('admin.reports.index');

});

// Customer Routes
Route::prefix('customer')->middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/dashboard', [CustomerDashboardController::class, 'dashboard'])->name('customer.dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('customer.profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('customer.profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('customer.profile.update');

    // Products
    Route::get('/products', [CustomerDashboardController::class, 'products'])->name('customer.products');
    Route::get('/products/{product}', [CustomerDashboardController::class, 'showProduct'])->name('customer.products.show');

    // Orders
    Route::get('/orders', [CustomerDashboardController::class, 'orders'])->name('customer.orders');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('customer.orders.show');
    Route::post('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('customer.orders.cancel');

    // Cart
    Route::get('/cart', [CartController::class, 'index'])->name('customer.cart');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('customer.cart.add');
    Route::put('/cart/{cartItem}', [CartController::class, 'update'])->name('customer.cart.update');
    Route::delete('/cart/{cartItem}', [CartController::class, 'remove'])->name('customer.cart.remove');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('customer.cart.clear');

    // Checkout
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('customer.checkout');
    Route::post('/orders', [OrderController::class, 'store'])->name('customer.orders.store');
    Route::post('/validate-coupon', [OrderController::class, 'validateCoupon'])->name('customer.validate-coupon');

    // Subscriptions
    Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('customer.subscriptions.index');
    Route::get('/subscriptions/create/{product}', [SubscriptionController::class, 'create'])->name('customer.subscriptions.create');
    Route::post('/subscriptions/{product}', [SubscriptionController::class, 'store'])->name('customer.subscriptions.store');
    Route::get('/subscriptions/{subscription}', [SubscriptionController::class, 'show'])->name('customer.subscriptions.show');
    Route::post('/subscriptions/{subscription}/pause', [SubscriptionController::class, 'pause'])->name('customer.subscriptions.pause');
    Route::post('/subscriptions/{subscription}/resume', [SubscriptionController::class, 'resume'])->name('customer.subscriptions.resume');
    Route::post('/subscriptions/{subscription}/cancel', [SubscriptionController::class, 'cancel'])->name('customer.subscriptions.cancel');
    Route::put('/subscriptions/{subscription}', [SubscriptionController::class, 'update'])->name('customer.subscriptions.update');
});

// Delivery Agent Routes
Route::prefix('delivery')->middleware(['auth', 'role:delivery_agent'])->group(function () {
    Route::get('/dashboard', [DeliveryDashboardController::class, 'dashboard'])->name('delivery.dashboard');

    // Deliveries
    Route::get('/deliveries', [DeliveryController::class, 'index'])->name('delivery.deliveries');
    Route::get('/deliveries/{order}', [DeliveryController::class, 'show'])->name('delivery.deliveries.show');
    Route::put('/deliveries/{order}', [DeliveryController::class, 'update'])->name('delivery.deliveries.update');
});

    // Settings
        Route::get('/settings', [SettingController::class, 'index'])
            ->middleware('can:manage_settings')
            ->name('admin.settings.index');
        Route::post('/settings', [SettingController::class, 'update'])
            ->middleware('can:manage_settings')
            ->name('admin.settings.update');


