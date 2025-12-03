<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index()
    {
        $roles       = Role::with('permissions')->get();
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('roles', 'permissions'));
    }

    public function assignPermissions(Request $request, Role $role)
    {
        $validated = $request->validate([
            'permissions'   => 'array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $role->permissions()->sync($validated['permissions'] ?? []);

        return redirect()->back()->with('success', 'Permissions updated for ' . $role->name);
    }

    public function updatePermissionDetails(Request $request, Permission $permission)
    {
        $validated = $request->validate([
            'description' => 'nullable|string',
        ]);

        $permission->update($validated);

        return redirect()->back()->with('success', 'Permission updated successfully!');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'slug'        => 'required|string|max:255|unique:permissions,slug',
            'description' => 'nullable|string',
        ]);
        Permission::create($validated);
        return redirect()->route('admin.permissions.index')->with('success', 'Permission added successfully!');
    }
}
