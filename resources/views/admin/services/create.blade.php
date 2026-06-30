<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Service | Metro Health Admin</title>
    
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
        @section('page-title', 'Add New Service')
        @include('admin.partials.topbar')

        <div class="container-fluid p-4">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-plus me-2"></i>Add New Service</h5>
                    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Services
                    </a>
                </div>
                <div class="admin-card-body">
                    <form action="{{ route('admin.services.store') }}" method="POST">
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-8">
                                <label class="form-label">Service Name *</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                                @error('title')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Display Order</label>
                                <input type="number" name="order" class="form-control" min="0" value="{{ old('order', 0) }}">
                                @error('order')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label">Description *</label>
                                <textarea name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
                                @error('description')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-12">
                                <hr>
                                <h5 class="mb-3"><i class="fas fa-tag me-2"></i>Service Pricing</h5>
                                <p class="text-muted">Set a price range for this service. Customers will see this range when booking.</p>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Minimum Price (£)</label>
                                <input type="number" name="price_min" class="form-control form-control-lg" step="0.01" min="0" value="{{ old('price_min') }}" placeholder="0.00">
                                <small class="text-muted">Starting price for this service</small>
                                @error('price_min')<span class="text-danger small d-block">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Maximum Price (£)</label>
                                <input type="number" name="price_max" class="form-control form-control-lg" step="0.01" min="0" value="{{ old('price_max') }}" placeholder="0.00">
                                <small class="text-muted">Maximum price for this service</small>
                                @error('price_max')<span class="text-danger small d-block">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-12">
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i>
                                    <strong>Pricing Tip:</strong> Set a range to account for variations in hair condition, length and complexity. Leave blank if pricing varies significantly.
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Icon Class</label>
                                <input type="text" name="icon" class="form-control" value="{{ old('icon', 'fas fa-cut') }}" placeholder="fas fa-cut">
                                <small class="text-muted">FontAwesome icon class</small>
                                @error('icon')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">&nbsp;</label>
                                <div class="form-check">
                                    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" {{ old('is_active', true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Active (Service will be visible to customers)
                                    </label>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-save me-2"></i>Create Service
                                </button>
                                <a href="{{ route('admin.services.index') }}" class="btn btn-secondary btn-lg">Cancel</a>
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
