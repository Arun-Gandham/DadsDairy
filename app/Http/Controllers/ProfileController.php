<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show customer profile
     */
    public function show()
    {
        $user = Auth::user();
        return view('customer.profile.show', compact('user'));
    }

    /**
     * Show edit profile form
     */
    public function edit()
    {
        $user = Auth::user();
        return view('customer.profile.edit', compact('user'));
    }

    /**
     * Update profile
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . Auth::id(),
            'phone'    => 'nullable|string|max:20',
            'address'  => 'nullable|string|max:500',
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Update basic info
        $user->update([
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'phone'   => $validated['phone'],
            'address' => $validated['address'],
        ]);

        // Update password if provided
        if ($validated['password']) {
            $user->update(['password' => Hash::make($validated['password'])]);
        }

        return redirect()->route('customer.profile.show')->with('success', 'Profile updated successfully!');
    }
}
