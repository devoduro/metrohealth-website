<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Services | Metro Health Admin</title>

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
        @section('page-title', 'Our Services')
        @include('admin.partials.topbar')

        <div class="container-fluid p-4">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-list-alt me-2" style="color: #84a33f;"></i>Clinic Services</h5>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.service-categories.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-layer-group me-2"></i>Service Categories
                        </a>
                        <a href="{{ route('admin.clinic-services.create') }}" class="btn btn-success">
                            <i class="fas fa-plus me-2"></i>Add Clinic Service
                        </a>
                    </div>
                </div>
                <div class="admin-card-body">
                    @if($clinicServices->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="20%">Name</th>
                                    <th width="12%">Category</th>
                                    <th width="10%">Doctors</th>
                                    <th width="13%">Multi-Doctor</th>
                                    <th width="8%">Order</th>
                                    <th width="12%">Status</th>
                                    <th width="20%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clinicServices as $clinicService)
                                <tr>
                                    <td><strong class="text-muted">#{{ $clinicService->id }}</strong></td>
                                    <td><strong>{{ $clinicService->name }}</strong></td>
                                    <td>
                                        @if($clinicService->serviceCategory)
                                        <span class="badge bg-light text-dark border">{{ $clinicService->serviceCategory->name }}</span>
                                        @else
                                        <span class="text-muted">&mdash;</span>
                                        @endif
                                    </td>
                                    <td><span class="badge bg-info">{{ $clinicService->doctors_count }}</span></td>
                                    <td>
                                        <span class="badge bg-{{ $clinicService->has_multiple_doctors ? 'success' : 'secondary' }}">
                                            {{ $clinicService->has_multiple_doctors ? 'Yes — shows doctor picker' : 'No — single doctor' }}
                                        </span>
                                    </td>
                                    <td><span class="badge bg-secondary">{{ $clinicService->order }}</span></td>
                                    <td>
                                        <span class="badge bg-{{ $clinicService->is_active ? 'success' : 'secondary' }}">
                                            <i class="fas fa-{{ $clinicService->is_active ? 'check-circle' : 'times-circle' }} me-1"></i>
                                            {{ $clinicService->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.clinic-services.edit', $clinicService) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('admin.clinic-services.destroy', $clinicService) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this clinic service? Doctors and appointment links to it will also be removed.');">
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
                        <i class="fas fa-list-alt fa-4x mb-3" style="color: #84a33f; opacity: 0.3;"></i>
                        <h5>No clinic services found</h5>
                        <a href="{{ route('admin.clinic-services.create') }}" class="btn btn-success mt-3">
                            <i class="fas fa-plus me-2"></i>Add First Clinic Service
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
