<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function toggle(User $user)
    {
        $user->is_active = !$user->is_active;
        $user->save();
        return redirect()->route('admin.users')->with('success', 'User status updated!');
    }
    public function index()
    {
        $users = User::with('role')->paginate(15);
        return view('admin.users.index', compact('users'));
    }
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'phone'    => 'nullable|string|max:20',
            'address'  => 'nullable|string|max:255',
            'password' => 'required|string|min:6',
            'role_id'  => 'required|exists:roles,id',
        ]);
        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);
        return redirect()->route('admin.users')->with('success', 'User added successfully!');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|unique:users,email,' . $user->id,
            'phone'   => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'role_id' => 'required|exists:roles,id',
        ]);
        // Only update password if provided
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->input('password'));
        }
        $user->update($validated);
        return redirect()->route('admin.users')->with('success', 'User updated successfully!');
    }
}
