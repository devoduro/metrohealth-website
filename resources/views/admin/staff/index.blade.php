<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Accounts | Metro Health Admin</title>

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
        @section('page-title', 'Staff Accounts')
        @include('admin.partials.topbar')

        <div class="container-fluid p-4">
            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-user-shield me-2" style="color: #84a33f;"></i>Staff Accounts</h5>
                    <a href="{{ route('admin.staff.create') }}" class="btn btn-success">
                        <i class="fas fa-plus me-2"></i>Create Staff Account
                    </a>
                </div>
                <div class="admin-card-body">
                    @if($staff->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Assigned Service(s)</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($staff as $member)
                                <tr>
                                    <td>
                                        <strong>{{ $member->name }}</strong>
                                        @if($member->doctor)
                                        <br><small class="text-muted">Linked: Dr. {{ $member->doctor->name }}</small>
                                        @endif
                                    </td>
                                    <td>{{ $member->email }}</td>
                                    <td>
                                        <span class="badge bg-{{ $member->getRoleBadgeColor() }}">{{ $member->roleRecord->name ?? ucfirst($member->role) }}</span>
                                    </td>
                                    <td>
                                        @forelse($member->clinicServices as $service)
                                        <span class="badge bg-light text-dark border">{{ $service->name }}</span>
                                        @empty
                                        <span class="text-muted small">—</span>
                                        @endforelse
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $member->is_active ? 'success' : 'secondary' }}">
                                            {{ $member->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.staff.edit', $member) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @if($member->id !== auth()->id())
                                            <form action="{{ route('admin.staff.destroy', $member) }}" method="POST" class="d-inline" onsubmit="return confirm('Remove this staff account?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center py-5 text-muted">
                        <i class="fas fa-user-shield fa-4x mb-3" style="color: #84a33f; opacity: 0.3;"></i>
                        <h5>No staff accounts found</h5>
                        <a href="{{ route('admin.staff.create') }}" class="btn btn-success mt-3">
                            <i class="fas fa-plus me-2"></i>Create First Staff Account
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
