<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product | Metro Health Admin</title>
    
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
        @section('page-title', 'Edit Product')
        @include('admin.partials.topbar')

        <div class="container-fluid p-4">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-edit me-2"></i>Edit Product: {{ $product->name }}</h5>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Products
                    </a>
                </div>
                <div class="admin-card-body">
                    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label">Product Name *</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
                                @error('name')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Category *</label>
                                <select name="category" class="form-select" required>
                                    <option value="">Select Category</option>
                                    <option value="Cleansers & Shampoos" {{ old('category', $product->category) == 'Cleansers & Shampoos' ? 'selected' : '' }}>Cleansers & Shampoos</option>
                                    <option value="Conditioners & Leave-ins" {{ old('category', $product->category) == 'Conditioners & Leave-ins' ? 'selected' : '' }}>Conditioners & Leave-ins</option>
                                    <option value="Oils & Scalp Treatments" {{ old('category', $product->category) == 'Oils & Scalp Treatments' ? 'selected' : '' }}>Oils & Scalp Treatments</option>
                                    <option value="Loc & Styling Products" {{ old('category', $product->category) == 'Loc & Styling Products' ? 'selected' : '' }}>Loc & Styling Products</option>
                                    <option value="Extension Hair Pieces" {{ old('category', $product->category) == 'Extension Hair Pieces' ? 'selected' : '' }}>Extension Hair Pieces</option>
                                    <option value="Tools & Accessories" {{ old('category', $product->category) == 'Tools & Accessories' ? 'selected' : '' }}>Tools & Accessories</option>
                                    <option value="Gift Sets & Bundles" {{ old('category', $product->category) == 'Gift Sets & Bundles' ? 'selected' : '' }}>Gift Sets & Bundles</option>
                                </select>
                                @error('category')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label">Description *</label>
                                <textarea name="description" class="form-control" rows="4" required>{{ old('description', $product->description) }}</textarea>
                                @error('description')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Price (£) *</label>
                                <input type="number" name="price" class="form-control" step="0.01" min="0" value="{{ old('price', $product->price) }}" required>
                                @error('price')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Stock Quantity *</label>
                                <input type="number" name="stock" class="form-control" min="0" value="{{ old('stock', $product->stock) }}" required>
                                @error('stock')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Display Order</label>
                                <input type="number" name="order" class="form-control" min="0" value="{{ old('order', $product->order) }}">
                                @error('order')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label">Product Image</label>
                                
                                <!-- Current Image Preview -->
                                @if($product->image)
                                <div class="mb-3">
                                    <p class="small text-muted mb-2">Current Image:</p>
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" id="currentImage" style="max-width: 200px; height: auto; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                                </div>
                                @endif

                                <!-- Image Upload Area -->
                                <div class="image-upload-area" id="imageUploadArea" style="border: 2px dashed #ddd; border-radius: 15px; padding: 30px; text-align: center; background: #f8f9fa; cursor: pointer; transition: all 0.3s;">
                                    <input type="file" name="image_file" id="imageFile" accept="image/*" style="display: none;">
                                    <div id="uploadPlaceholder">
                                        <i class="fas fa-cloud-upload-alt" style="font-size: 3rem; color: var(--ashlocs-orange); margin-bottom: 15px;"></i>
                                        <h5 style="color: var(--ashlocs-dark); margin-bottom: 10px;">Upload Product Image</h5>
                                        <p class="text-muted mb-2">Drag & drop an image here or click to browse</p>
                                        <small class="text-muted">Supported formats: JPG, PNG, WEBP (Max 5MB)</small>
                                    </div>
                                    <div id="imagePreview" style="display: none;">
                                        <img id="previewImg" src="" alt="Preview" style="max-width: 100%; max-height: 300px; border-radius: 10px; margin-bottom: 15px;">
                                        <div>
                                            <button type="button" class="btn btn-sm btn-danger" id="removeImage">
                                                <i class="fas fa-trash me-1"></i>Remove Image
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Keep existing image path if no new upload -->
                                <input type="hidden" name="existing_image" value="{{ $product->image }}">
                                
                                @error('image_file')<span class="text-danger small d-block mt-2">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Icon Class</label>
                                <input type="text" name="icon" class="form-control" value="{{ old('icon', $product->icon) }}" placeholder="fas fa-box">
                                <small class="text-muted">FontAwesome icon class</small>
                                @error('icon')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-12">
                                <div class="form-check">
                                    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" {{ old('is_active', $product->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Active (Product will be visible in shop)
                                    </label>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-save me-2"></i>Update Product
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
    <script>
        // Image upload functionality
        const uploadArea = document.getElementById('imageUploadArea');
        const fileInput = document.getElementById('imageFile');
        const uploadPlaceholder = document.getElementById('uploadPlaceholder');
        const imagePreview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        const removeBtn = document.getElementById('removeImage');
        const currentImage = document.getElementById('currentImage');

        // Click to upload
        uploadArea.addEventListener('click', (e) => {
            if (e.target.id !== 'removeImage') {
                fileInput.click();
            }
        });

        // File input change
        fileInput.addEventListener('change', (e) => {
            handleFile(e.target.files[0]);
        });

        // Drag and drop
        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.style.borderColor = 'var(--ashlocs-orange)';
            uploadArea.style.background = '#fff9f0';
        });

        uploadArea.addEventListener('dragleave', (e) => {
            e.preventDefault();
            uploadArea.style.borderColor = '#ddd';
            uploadArea.style.background = '#f8f9fa';
        });

        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadArea.style.borderColor = '#ddd';
            uploadArea.style.background = '#f8f9fa';
            
            const file = e.dataTransfer.files[0];
            if (file && file.type.startsWith('image/')) {
                fileInput.files = e.dataTransfer.files;
                handleFile(file);
            }
        });

        // Handle file preview
        function handleFile(file) {
            if (!file) return;

            // Check file size (5MB max)
            if (file.size > 5 * 1024 * 1024) {
                alert('File size must be less than 5MB');
                return;
            }

            // Check file type
            if (!file.type.startsWith('image/')) {
                alert('Please upload an image file');
                return;
            }

            // Show preview
            const reader = new FileReader();
            reader.onload = (e) => {
                previewImg.src = e.target.result;
                uploadPlaceholder.style.display = 'none';
                imagePreview.style.display = 'block';
                
                // Hide current image when new one is uploaded
                if (currentImage) {
                    currentImage.style.display = 'none';
                }
            };
            reader.readAsDataURL(file);
        }

        // Remove image
        removeBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            fileInput.value = '';
            uploadPlaceholder.style.display = 'block';
            imagePreview.style.display = 'none';
            
            // Show current image again
            if (currentImage) {
                currentImage.style.display = 'block';
            }
        });
    </script>
</body>
</html>
