@extends('admin.layouts.app')

@section('title', 'Edit Role')

@section('content')
<h1 class="mb-4">Edit Role</h1>
<form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Role Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}" required>
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label">Role Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" value="{{ $role->slug }}" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description">{{ $role->description }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update Role</button>
</form>
@endsection
