@extends('admin.layouts.app')

@section('title', 'Categories')

@section('content')
<h1 class="mb-4">Categories</h1>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="row">
    @forelse ($categories as $category)
    <div class="col-md-4 mb-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $category->name }}</h5>
                <p class="text-muted">{{ $category->products->count() }} products</p>
                <p class="card-text">{{ $category->description ?? 'No description' }}</p>
                <div class="btn-group w-100" role="group">
                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                    <form action="#" method="POST" style="display: inline;" onsubmit="return confirm('Delete this category?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="alert alert-info">No categories found</div>
    </div>
    @endforelse
</div>
@endsection
