<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Logout for admin
     */
    public function logoutAdmin(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    /**
     * Handle admin login
     */
    public function loginAdmin(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);
        $user = \App\Models\User::where('email', $credentials['email'])->first();
        if ($user && !$user->hasRole('admin')) {
            return back()->withErrors(['email' => 'You are not authorized to login as admin.']);
        }
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }
        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    /**
     * Handle customer login
     */
    public function loginCustomer(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);
        $user = \App\Models\User::where('email', $credentials['email'])->first();
        if ($user && !$user->hasRole('customer')) {
            return back()->withErrors(['email' => 'You are not authorized to login as customer.']);
        }
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('customer.profile.show'));
        }
        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    /**
     * Handle delivery login
     */
    public function loginDelivery(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);
        $user = \App\Models\User::where('email', $credentials['email'])->first();
        if ($user && !$user->hasRole('delivery_agent')) {
            return back()->withErrors(['email' => 'You are not authorized to login as delivery agent.']);
        }
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('delivery.dashboard'));
        }
        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    /**
     * Logout for customer
     */
    public function logoutCustomer(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('customer.landing');
    }

    /**
     * Logout for delivery
     */
    public function logoutDelivery(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('delivery.login');
    }

    /**
     * Logout for user
     */
    public function logoutUser(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.login');
    }
    /**
     * Show login form
     */

    // Show admin login form
    public function showAdminLogin()
    {
        if (auth()->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('auth.login_admin');
    }

    // Show customer login form
    public function showCustomerLogin()
    {
        if (auth()->check()) {
            return redirect()->route('customer.profile.show');
        }
        return view('auth.login_customer');
    }

    // Show delivery login form
    public function showDeliveryLogin()
    {
        if (auth()->check()) {
            return redirect()->route('delivery.dashboard');
        }
        return view('auth.login_delivery');
    }

    // Show user login form (optional, if needed)
    public function showUserLogin()
    {
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login_user');
    }

    /**
     * Handle login
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $route = $request->route()->getName();
        $roleSlug = null;
        if ($route === 'admin.login') {
            $roleSlug = 'admin';
        } elseif ($route === 'customer.login') {
            $roleSlug = 'customer';
        } elseif ($route === 'delivery.login') {
            $roleSlug = 'delivery_agent';
        } elseif ($route === 'user.login') {
            $roleSlug = 'user';
        }

        $user = \App\Models\User::where('email', $credentials['email'])->first();
        if ($user && $roleSlug && !$user->hasRole($roleSlug)) {
            return back()->withErrors([
                'email' => 'You are not authorized to login from this portal.'
            ]);
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended($this->redirectTo());
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Show registration form
     */
    public function showRegister()
    {
        // Redirect if user is already logged in
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.register');
    }

    /**
     * Handle registration
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone'    => 'nullable|string|max:20',
            'address'  => 'nullable|string',
        ]);

        // Create user with customer role by default
        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone'    => $validated['phone'] ?? null,
            'address'  => $validated['address'] ?? null,
            'role_id'  => Role::where('slug', 'customer')->first()->id,
        ]);

        Auth::login($user);
        return redirect()->route('dashboard');
    }

    /**
     * Handle logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('customer.landing');
    }

    /**
     * Get redirect path based on user role
     */
    private function redirectTo()
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return route('admin.dashboard');
        } elseif ($user->hasRole('delivery_agent')) {
            return route('delivery.dashboard');
        }

        return route('customer.products');
    }
}
