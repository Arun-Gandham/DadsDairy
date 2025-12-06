@extends('admin.layouts.app')

@section('title', 'Categories')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="d-inline-block ms-3 page-title">Categories</h1>
    </div>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-gradient">
        <i class="fas fa-plus"></i> Add Category
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if ($categories->count() > 0)
    <div class="row">
        @foreach ($categories as $category)
            <div class="col-md-4 mb-4">
                <div class="card category-card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <p class="card-text">{!! $category->description ?? 'No description' !!}</p>
                        <div class="mb-3">
                            <span class="badge-count">
                                <i class="fas fa-box"></i> {{ $category->products->count() }} Products
                            </span>
                        </div>
                        <div class="btn-group w-100 mb-2">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" style="width: 50%;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger w-100" onclick="return confirm('Delete this category?');">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                        @if($category->products->count())
                        <div class="mt-2">
                            <strong>Products in this category:</strong>
                            <ul class="list-group list-group-flush">
                                @foreach($category->products as $product)
                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-1">
                                        <span>{{ $product->name }}</span>
                                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-xs btn-outline-primary">Edit</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="alert alert-info">
        <i class="fas fa-info-circle"></i> No categories found.
        <a href="{{ route('admin.categories.create') }}">Create one now</a>
    </div>
@endif
@endsection
