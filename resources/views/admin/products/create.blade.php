<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product | Metro Health Admin</title>
    
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
        @section('page-title', 'Add New Product')
        @include('admin.partials.topbar')

        <div class="container-fluid p-4">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-plus me-2"></i>Add New Product</h5>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Products
                    </a>
                </div>
                <div class="admin-card-body">
                    <form action="{{ route('admin.products.store') }}" method="POST">
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label">Product Name *</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                @error('name')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Category *</label>
                                <select name="category" class="form-select" required>
                                    <option value="">Select Category</option>
                                    <option value="Cleansers & Shampoos" {{ old('category') == 'Cleansers & Shampoos' ? 'selected' : '' }}>Cleansers & Shampoos</option>
                                    <option value="Conditioners & Leave-ins" {{ old('category') == 'Conditioners & Leave-ins' ? 'selected' : '' }}>Conditioners & Leave-ins</option>
                                    <option value="Oils & Scalp Treatments" {{ old('category') == 'Oils & Scalp Treatments' ? 'selected' : '' }}>Oils & Scalp Treatments</option>
                                    <option value="Loc & Styling Products" {{ old('category') == 'Loc & Styling Products' ? 'selected' : '' }}>Loc & Styling Products</option>
                                    <option value="Extension Hair Pieces" {{ old('category') == 'Extension Hair Pieces' ? 'selected' : '' }}>Extension Hair Pieces</option>
                                    <option value="Tools & Accessories" {{ old('category') == 'Tools & Accessories' ? 'selected' : '' }}>Tools & Accessories</option>
                                    <option value="Gift Sets & Bundles" {{ old('category') == 'Gift Sets & Bundles' ? 'selected' : '' }}>Gift Sets & Bundles</option>
                                </select>
                                @error('category')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label">Description *</label>
                                <textarea name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                                @error('description')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Price (£) *</label>
                                <input type="number" name="price" class="form-control" step="0.01" min="0" value="{{ old('price') }}" required>
                                @error('price')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Stock Quantity *</label>
                                <input type="number" name="stock" class="form-control" min="0" value="{{ old('stock', 0) }}" required>
                                @error('stock')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Display Order</label>
                                <input type="number" name="order" class="form-control" min="0" value="{{ old('order', 0) }}">
                                @error('order')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Image Path</label>
                                <input type="text" name="image" class="form-control" value="{{ old('image') }}" placeholder="images/products/product-name.jpg">
                                <small class="text-muted">Example: images/products/loc-cream.jpg</small>
                                @error('image')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Icon Class</label>
                                <input type="text" name="icon" class="form-control" value="{{ old('icon', 'fas fa-box') }}" placeholder="fas fa-box">
                                <small class="text-muted">FontAwesome icon class</small>
                                @error('icon')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-12">
                                <div class="form-check">
                                    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" {{ old('is_active', true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Active (Product will be visible in shop)
                                    </label>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-save me-2"></i>Create Product
                                </button>
                                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary btn-lg">Cancel</a>
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
