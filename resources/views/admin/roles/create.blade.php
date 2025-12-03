@extends('admin.layouts.app')

@section('title', 'Add Role')

@section('content')
<h1 class="mb-4">Add Role</h1>
<form action="{{ route('admin.roles.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Role Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label">Role Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Create Role</button>
</form>
@endsection
