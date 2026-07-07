<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Service Category | Metro Health Admin</title>

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
        @section('page-title', 'Edit Service Category')
        @include('admin.partials.topbar')

        <div class="container-fluid p-4">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-edit me-2"></i>Edit Category: {{ $serviceCategory->name }}</h5>
                    <a href="{{ route('admin.service-categories.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Categories
                    </a>
                </div>
                <div class="admin-card-body">
                    <form action="{{ route('admin.service-categories.update', $serviceCategory) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-4">
                            <div class="col-md-8">
                                <label class="form-label">Category Name *</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $serviceCategory->name) }}" required>
                                @error('name')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Display Order</label>
                                <input type="number" name="order" class="form-control" min="0" value="{{ old('order', $serviceCategory->order) }}">
                                @error('order')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-save me-2"></i>Update Category
                                </button>
                                <a href="{{ route('admin.service-categories.index') }}" class="btn btn-secondary btn-lg">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
