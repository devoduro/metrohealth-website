<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors | Metro Health Admin</title>

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
        @section('page-title', 'Doctors')
        @include('admin.partials.topbar')

        <div class="container-fluid p-4">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-user-md me-2" style="color: #84a33f;"></i>Doctors</h5>
                    <a href="{{ route('admin.doctors.create') }}" class="btn btn-success">
                        <i class="fas fa-plus me-2"></i>Register Doctor
                    </a>
                </div>
                <div class="admin-card-body">
                    @if($doctors->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="25%">Name</th>
                                    <th width="25%">Clinic Service</th>
                                    <th width="20%">Operating Days</th>
                                    <th width="10%">Status</th>
                                    <th width="15%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($doctors as $doctor)
                                <tr>
                                    <td><strong class="text-muted">#{{ $doctor->id }}</strong></td>
                                    <td><strong>Dr. {{ $doctor->name }}</strong></td>
                                    <td>{{ $doctor->clinicService->name ?? '—' }}</td>
                                    <td>
                                        @forelse($doctor->days ?? [] as $day)
                                        <span class="badge bg-light text-dark border">{{ Str::limit($day, 3, '') }}</span>
                                        @empty
                                        <span class="text-muted small">Not set</span>
                                        @endforelse
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $doctor->is_active ? 'success' : 'secondary' }}">
                                            <i class="fas fa-{{ $doctor->is_active ? 'check-circle' : 'times-circle' }} me-1"></i>
                                            {{ $doctor->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.doctors.edit', $doctor) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('admin.doctors.destroy', $doctor) }}" method="POST" class="d-inline" onsubmit="return confirm('Remove this doctor?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center py-5 text-muted">
                        <i class="fas fa-user-md fa-4x mb-3" style="color: #84a33f; opacity: 0.3;"></i>
                        <h5>No doctors registered</h5>
                        <a href="{{ route('admin.doctors.create') }}" class="btn btn-success mt-3">
                            <i class="fas fa-plus me-2"></i>Register First Doctor
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
