<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles & Permissions | Metro Health Admin</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/ashlocs-custom.css') }}">
</head>
<body style="background: #f8f9fa;">

    @include('admin.partials.sidebar')

    <div class="admin-content">
        @section('page-title', 'Roles & Permissions')
        @include('admin.partials.topbar')

        <div class="container-fluid p-4">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-user-tag me-2" style="color: #84a33f;"></i>Roles & Permissions</h5>
                    <a href="{{ route('admin.roles.create') }}" class="btn btn-success">
                        <i class="fas fa-plus me-2"></i>Add Role
                    </a>
                </div>
                <div class="admin-card-body">
                    <p class="text-muted">Every role controls two things: what kind of dashboard a staff member sees, and which admin sections they can additionally reach.</p>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Role</th>
                                    <th>Dashboard Type</th>
                                    <th>Permissions</th>
                                    <th>Staff</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                <tr>
                                    <td>
                                        <strong>{{ $role->name }}</strong>
                                        @if($role->is_system)
                                        <span class="badge bg-secondary ms-1">Built-in</span>
                                        @endif
                                        <br><small class="text-muted">{{ $role->slug }}</small>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $role->dashboard_scope == 'full' ? 'danger' : ($role->dashboard_scope == 'clinical' ? 'success' : 'warning') }}">
                                            {{ ucfirst($role->dashboard_scope) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($role->dashboard_scope == 'full')
                                        <span class="text-muted small">All sections (full access)</span>
                                        @elseif(empty($role->permissions))
                                        <span class="text-muted small">None granted</span>
                                        @else
                                        @foreach($role->permissions as $permission)
                                        <span class="badge bg-light text-dark border mb-1">{{ \App\Models\Role::availablePermissions()[$permission] ?? $permission }}</span>
                                        @endforeach
                                        @endif
                                    </td>
                                    <td><span class="badge bg-info">{{ $role->users_count }}</span></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @unless($role->is_system)
                                            <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this role?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            @endunless
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
