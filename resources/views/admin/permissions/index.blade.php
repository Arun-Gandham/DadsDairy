@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="mb-0">Permissions Management</h2>
            <small class="text-muted">Manage role-based permissions</small>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
    </div>

    <!-- <div class="row mb-4">
        <div class="col-md-12">
            <form action="{{ route('admin.permissions.store') }}" method="POST" class="card card-body shadow-sm mb-4">
                @csrf
                <h5 class="mb-3">Add New Permission</h5>
                <div class="mb-3">
                    <label for="name" class="form-label">Permission Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Permission Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add Permission</button>
            </form>
        </div>
    </div> -->
    @if($roles->isEmpty())
        <div class="alert alert-info" role="alert">
            <i class="fas fa-info-circle"></i> No roles found in the system.
        </div>
    @else
        <!-- Tabs for each role -->
        <ul class="nav nav-tabs mb-4" role="tablist">
            @foreach($roles as $index => $role)
                <li class="nav-item" role="presentation">
                    <button class="nav-link @if($index === 0) active @endif"
                            id="role-{{ $role->id }}-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#role-{{ $role->id }}"
                            type="button"
                            role="tab">
                        <i class="fas fa-shield-alt"></i> {{ ucfirst($role->name) }}
                    </button>
                </li>
            @endforeach
        </ul>

        <div class="tab-content">
            @foreach($roles as $index => $role)
                <div class="tab-pane fade @if($index === 0) show active @endif"
                     id="role-{{ $role->id }}"
                     role="tabpanel">

                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">
                                <i class="fas fa-cog"></i> Permissions for <strong>{{ ucfirst($role->name) }}</strong>
                            </h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.permissions.assign', $role->id) }}" method="POST">
                                @csrf
                                <div class="row">
                                    @forelse($permissions as $permission)
                                        <div class="col-md-6 col-lg-4 mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input"
                                                       type="checkbox"
                                                       id="permission-{{ $permission->id }}"
                                                       name="permissions[]"
                                                       value="{{ $permission->id }}"
                                                       @checked(in_array($permission->id, $role->permissions->pluck('id')->toArray()))>
                                                <label class="form-check-label" for="permission-{{ $permission->id }}">
                                                    <strong>{{ $permission->name }}</strong>
                                                    @if($permission->description)
                                                        <br>
                                                        <small class="text-muted d-block">{{ $permission->description }}</small>
                                                    @endif
                                                </label>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12">
                                            <div class="alert alert-warning" role="alert">
                                                <i class="fas fa-exclamation-triangle"></i> No permissions found. Please create permissions first.
                                            </div>
                                        </div>
                                    @endforelse
                                </div>

                                @if(!$permissions->isEmpty())
                                    <div class="mt-4 pt-3 border-top d-flex gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> Save Permissions
                                        </button>
                                        <button type="button" class="btn btn-outline-secondary" onclick="selectAllPermissions({{ $role->id }})">
                                            <i class="fas fa-check"></i> Select All
                                        </button>
                                        <button type="button" class="btn btn-outline-secondary" onclick="clearAllPermissions({{ $role->id }})">
                                            <i class="fas fa-times"></i> Clear All
                                        </button>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>

                    <!-- Permission Categories -->
                    @php
                        $categorized = $permissions->groupBy(function($perm) {
                            return explode('_', $perm->name)[0] ?? 'other';
                        });
                    @endphp

                    @if($categorized->count() > 0)
                        <div class="row mt-4">
                            @foreach($categorized as $category => $perms)
                                <div class="col-md-6 col-lg-4 mb-3">
                                    <div class="card bg-light border-0">
                                        <div class="card-body">
                                            <h6 class="card-title text-capitalize">
                                                @switch($category)
                                                    @case('view')
                                                        <i class="fas fa-eye"></i> View
                                                        @break
                                                    @case('create')
                                                        <i class="fas fa-plus"></i> Create
                                                        @break
                                                    @case('edit')
                                                        <i class="fas fa-edit"></i> Edit
                                                        @break
                                                    @case('delete')
                                                        <i class="fas fa-trash"></i> Delete
                                                        @break
                                                    @case('manage')
                                                        <i class="fas fa-cogs"></i> Manage
                                                        @break
                                                    @default
                                                        <i class="fas fa-lock"></i> {{ ucfirst($category) }}
                                                @endswitch
                                            </h6>
                                            <small class="text-muted">{{ $perms->count() }} permissions</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</div>

<!-- Role Information Card -->
<div class="row mt-5">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header bg-light">
                <h5 class="mb-0"><i class="fas fa-info-circle"></i> How Permissions Work</h5>
            </div>
            <div class="card-body">
                <p>Permissions control what actions each role can perform in the system:</p>
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="fw-bold text-primary">
                            <i class="fas fa-user-shield"></i> Admin Role
                        </h6>
                        <p class="mb-0">Full system access. Can manage all resources, users, and settings.</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-bold text-success">
                            <i class="fas fa-user"></i> Customer Role
                        </h6>
                        <p class="mb-0">Limited access. Can view and manage only their own orders and profile.</p>
                    </div>
                </div>
                <hr>
                <div class="alert alert-info mb-0">
                    <strong>Tip:</strong> Select multiple permissions using the checkboxes above, then click "Save Permissions" to apply changes to a role.
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card shadow-sm bg-light">
            <div class="card-body">
                <h6 class="card-title fw-bold mb-3">
                    <i class="fas fa-list"></i> System Roles
                </h6>
                <div class="list-group list-group-flush">
                    @forelse($roles as $role)
                        <div class="list-group-item bg-light border-0 py-2">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-circle text-primary me-2" style="font-size: 0.5rem;"></i>
                                <strong class="text-capitalize">{{ $role->name }}</strong>
                                <span class="badge bg-primary ms-auto">{{ $role->permissions->count() }} perms</span>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted mb-0">No roles found</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function selectAllPermissions(roleId) {
        const tabPane = document.querySelector(`#role-${roleId}`);
        const checkboxes = tabPane.querySelectorAll('input[type="checkbox"][name="permissions[]"]');
        checkboxes.forEach(cb => cb.checked = true);
    }

    function clearAllPermissions(roleId) {
        const tabPane = document.querySelector(`#role-${roleId}`);
        const checkboxes = tabPane.querySelectorAll('input[type="checkbox"][name="permissions[]"]');
        checkboxes.forEach(cb => cb.checked = false);
    }
</script>

<style>
    .nav-tabs .nav-link {
        color: #666;
        border-color: transparent;
    }

    .nav-tabs .nav-link.active {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-color: transparent;
    }

    .nav-tabs .nav-link:hover {
        border-color: #667eea;
    }

    .form-check-input:checked {
        background-color: #667eea;
        border-color: #667eea;
    }

    .form-check-input:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.25rem rgba(102, 126, 234, 0.25);
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #5568d3 0%, #6a3a8a 100%);
    }
</style>
@endsection
