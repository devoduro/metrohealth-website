<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Review | Metro Health Admin</title>
    
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
        @include('admin.partials.topbar')

        <div class="container-fluid p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Review</h1>
        <a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Reviews
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Review Details</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.reviews.update', $review) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="customer_name" class="form-label">Customer Name <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('customer_name') is-invalid @enderror" 
                                   id="customer_name" 
                                   name="customer_name" 
                                   value="{{ old('customer_name', $review->customer_name) }}" 
                                   required>
                            @error('customer_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="customer_email" class="form-label">Customer Email</label>
                            <input type="email" 
                                   class="form-control @error('customer_email') is-invalid @enderror" 
                                   id="customer_email" 
                                   name="customer_email" 
                                   value="{{ old('customer_email', $review->customer_email) }}">
                            @error('customer_email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating <span class="text-danger">*</span></label>
                            <select class="form-select @error('rating') is-invalid @enderror" 
                                    id="rating" 
                                    name="rating" 
                                    required>
                                <option value="">Select Rating</option>
                                @for($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" {{ old('rating', $review->rating) == $i ? 'selected' : '' }}>
                                        {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                                        @for($j = 0; $j < $i; $j++) ⭐ @endfor
                                    </option>
                                @endfor
                            </select>
                            @error('rating')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="review" class="form-label">Review Text <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('review') is-invalid @enderror" 
                                      id="review" 
                                      name="review" 
                                      rows="5" 
                                      required>{{ old('review', $review->review) }}</textarea>
                            <small class="text-muted">Maximum 1000 characters</small>
                            @error('review')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       id="is_approved" 
                                       name="is_approved" 
                                       {{ old('is_approved', $review->is_approved) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_approved">
                                    <strong>Approved</strong>
                                    <br>
                                    <small class="text-muted">Only approved reviews will be displayed on the website</small>
                                </label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Review
                            </button>
                            <a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Review Info</h6>
                </div>
                <div class="card-body">
                    <p><strong>Review ID:</strong> #{{ $review->id }}</p>
                    <p><strong>Created:</strong> {{ $review->created_at->format('M d, Y g:i A') }}</p>
                    <p><strong>Last Updated:</strong> {{ $review->updated_at->format('M d, Y g:i A') }}</p>
                    <p><strong>Status:</strong> 
                        @if($review->is_approved)
                            <span class="badge bg-success">Approved</span>
                        @else
                            <span class="badge bg-warning text-dark">Pending</span>
                        @endif
                    </p>
                    
                    <hr>
                    
                    <div class="d-grid gap-2">
                        <form action="{{ route('admin.reviews.toggle-approval', $review) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-{{ $review->is_approved ? 'warning' : 'success' }} w-100">
                                <i class="fas fa-{{ $review->is_approved ? 'times' : 'check' }}"></i>
                                {{ $review->is_approved ? 'Unapprove' : 'Approve' }} Review
                            </button>
                        </form>
                        
                        <form action="{{ route('admin.reviews.destroy', $review) }}" 
                              method="POST" 
                              onsubmit="return confirm('Are you sure you want to delete this review? This action cannot be undone.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fas fa-trash"></i> Delete Review
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
