@extends('admin.layouts.app')

@section('title', 'Users Management')

@section('content')
<h1 class="mb-4">Users Management</h1>
<form method="GET" action="{{ route('admin.users') }}" class="row g-2 mb-3">
    <div class="col-md-4">
        <input type="text" name="search" class="form-control" placeholder="Search by name or email" value="{{ request('search') }}">
    </div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary w-100">Search</button>
    </div>
    <div class="col-md-2">
        <a href="{{ route('admin.users') }}" class="btn btn-outline-secondary w-100">Reset</a>
    </div>
</form>
<a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Add New User</a>
<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Joined</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                    <td><strong>{{ $user->name }}</strong></td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->address }}</td>
                    <td>
                        <span class="badge bg-info">{{ $user->role->name ?? 'N/A' }}</span>
                    </td>
                    <td>
                        @if($user->is_active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td>{{ $user->created_at->format('M d, Y') }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No users found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{ $users->links() }}
@endsection
