<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Categories | Metro Health Admin</title>

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
        @section('page-title', 'Service Categories')
        @include('admin.partials.topbar')

        <div class="container-fluid p-4">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-layer-group me-2" style="color: #84a33f;"></i>Service Categories</h5>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.clinic-services.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to Our Services
                        </a>
                        <a href="{{ route('admin.service-categories.create') }}" class="btn btn-success">
                            <i class="fas fa-plus me-2"></i>Add Category
                        </a>
                    </div>
                </div>
                <div class="admin-card-body">
                    <p class="text-muted">Categories group Our Services on the Services page (e.g. Clinic, Labs, Procedure).</p>
                    @if($categories->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th width="10%">Order</th>
                                    <th width="40%">Name</th>
                                    <th width="20%">Services</th>
                                    <th width="30%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td><span class="badge bg-secondary">{{ $category->order }}</span></td>
                                    <td><strong>{{ $category->name }}</strong></td>
                                    <td><span class="badge bg-info">{{ $category->clinic_services_count }}</span></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.service-categories.edit', $category) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('admin.service-categories.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this category?');">
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
                        <i class="fas fa-layer-group fa-4x mb-3" style="color: #84a33f; opacity: 0.3;"></i>
                        <h5>No service categories found</h5>
                        <a href="{{ route('admin.service-categories.create') }}" class="btn btn-success mt-3">
                            <i class="fas fa-plus me-2"></i>Add First Category
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
