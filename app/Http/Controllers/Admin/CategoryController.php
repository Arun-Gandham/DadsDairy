<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index()
    {
        $categories = Category::with('products')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $users = \App\Models\User::orderBy('name')->get();
        return view('admin.categories.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255|unique:categories,name',
            'slug'        => 'nullable|string|max:255|unique:categories,slug',
            'description' => 'nullable|string',
            'user_ids'    => 'nullable|array',
            'user_ids.*'  => 'exists:users,id',
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name']);

        $category = Category::create($validated);
        if ($request->has('user_ids')) {
            $category->users()->sync($request->user_ids);
        }

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully!');
    }

    public function edit(Category $category)
    {
        $users = \App\Models\User::orderBy('name')->get();
        $selectedUserIds = $category->users()->pluck('users.id')->toArray();
        return view('admin.categories.edit', compact('category', 'users', 'selectedUserIds'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255|unique:categories,name,' . $category->id,
            'slug'        => 'nullable|string|max:255|unique:categories,slug,' . $category->id,
            'description' => 'nullable|string',
            'user_ids'    => 'nullable|array',
            'user_ids.*'  => 'exists:users,id',
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name']);

        $category->update($validated);
        if ($request->has('user_ids')) {
            $category->users()->sync($request->user_ids);
        } else {
            $category->users()->sync([]);
        }

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        if ($category->products()->count() > 0) {
            return redirect()->route('admin.categories.index')->with('error', 'Cannot delete category with products!');
        }

        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully!');
    }
}
