<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile | Metro Health Admin</title>

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
        @section('page-title', 'My Profile')
        @include('admin.partials.topbar')

        <div class="container-fluid p-4">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="admin-card">
                        <div class="admin-card-header">
                            <h5><i class="fas fa-user-circle me-2" style="color: #84a33f;"></i>Profile Information</h5>
                        </div>
                        <div class="admin-card-body">
                            <form action="{{ route('admin.profile.update') }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label class="form-label">Full Name *</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                                    @error('name')<span class="text-danger small d-block">{{ $message }}</span>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Email Address *</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                                    @error('email')<span class="text-danger small d-block">{{ $message }}</span>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}" placeholder="0241234567">
                                    @error('phone')<span class="text-danger small d-block">{{ $message }}</span>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Role</label>
                                    <input type="text" class="form-control" value="{{ ucfirst($user->role) }}" disabled>
                                    <small class="text-muted">Contact an administrator to change your role.</small>
                                </div>

                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save me-2"></i>Save Changes
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="admin-card">
                        <div class="admin-card-header">
                            <h5><i class="fas fa-lock me-2" style="color: #84a33f;"></i>Change Password</h5>
                        </div>
                        <div class="admin-card-body">
                            <form action="{{ route('admin.profile.password') }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label class="form-label">Current Password *</label>
                                    <input type="password" name="current_password" class="form-control" required>
                                    @error('current_password')<span class="text-danger small d-block">{{ $message }}</span>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">New Password *</label>
                                    <input type="password" name="password" class="form-control" minlength="8" required>
                                    @error('password')<span class="text-danger small d-block">{{ $message }}</span>@enderror
                                    <small class="text-muted">At least 8 characters.</small>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Confirm New Password *</label>
                                    <input type="password" name="password_confirmation" class="form-control" minlength="8" required>
                                </div>

                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-key me-2"></i>Change Password
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
