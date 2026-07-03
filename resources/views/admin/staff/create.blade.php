<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Staff Account | Metro Health Admin</title>

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
        @section('page-title', 'Create Staff Account')
        @include('admin.partials.topbar')

        <div class="container-fluid p-4">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-plus me-2"></i>Create Staff Account</h5>
                    <a href="{{ route('admin.staff.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Staff Accounts
                    </a>
                </div>
                <div class="admin-card-body">
                    <form action="{{ route('admin.staff.store') }}" method="POST">
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label">Full Name *</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                @error('name')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Email *</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                @error('email')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                                @error('phone')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Password *</label>
                                <input type="password" name="password" class="form-control" minlength="8" required>
                                <small class="text-muted">At least 8 characters</small>
                                @error('password')<span class="text-danger small d-block">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Role *</label>
                                <select name="role" id="roleSelect" class="form-select" required>
                                    <option value="">Choose a role...</option>
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="doctor" {{ old('role') == 'doctor' ? 'selected' : '' }}>Doctor</option>
                                    <option value="nurse" {{ old('role') == 'nurse' ? 'selected' : '' }}>Nurse</option>
                                    <option value="receptionist" {{ old('role') == 'receptionist' ? 'selected' : '' }}>Receptionist</option>
                                </select>
                                @error('role')<span class="text-danger small d-block">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">&nbsp;</label>
                                <div class="form-check">
                                    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" {{ old('is_active', true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Active</label>
                                </div>
                            </div>

                            <div class="col-12" id="doctorFields" style="display: none;">
                                <hr>
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <label class="form-label">Clinic Service *</label>
                                        <select name="clinic_service_id" class="form-select">
                                            <option value="">Choose a service...</option>
                                            @foreach($clinicServices as $clinicService)
                                            <option value="{{ $clinicService->id }}" {{ old('clinic_service_id') == $clinicService->id ? 'selected' : '' }}>{{ $clinicService->name }}</option>
                                            @endforeach
                                        </select>
                                        <small class="text-muted">Which service this doctor is scoped to for quick-add bookings</small>
                                        @error('clinic_service_id')<span class="text-danger small d-block">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Link to Doctor Directory Entry</label>
                                        <select name="doctor_id" class="form-select">
                                            <option value="">No link (not shown publicly)</option>
                                            @foreach($doctors as $doctor)
                                            <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>Dr. {{ $doctor->name }} ({{ $doctor->clinicService->name ?? '—' }})</option>
                                            @endforeach
                                        </select>
                                        <small class="text-muted">Optional — ties this login to an existing public doctor listing</small>
                                        @error('doctor_id')<span class="text-danger small d-block">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-12" id="nurseFields" style="display: none;">
                                <hr>
                                <label class="form-label fw-bold">Assigned Clinic Services *</label>
                                <p class="text-muted small">A nurse can be assigned to more than one service.</p>
                                <div class="row">
                                    @foreach($clinicServices as $clinicService)
                                    <div class="col-md-4 mb-2">
                                        <div class="form-check">
                                            <input type="checkbox" name="clinic_service_ids[]" value="{{ $clinicService->id }}" class="form-check-input" id="nurseService{{ $clinicService->id }}"
                                                {{ in_array($clinicService->id, old('clinic_service_ids', [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="nurseService{{ $clinicService->id }}">{{ $clinicService->name }}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @error('clinic_service_ids')<span class="text-danger small d-block">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-save me-2"></i>Create Staff Account
                                </button>
                                <a href="{{ route('admin.staff.index') }}" class="btn btn-secondary btn-lg">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const roleSelect = document.getElementById('roleSelect');
        const doctorFields = document.getElementById('doctorFields');
        const nurseFields = document.getElementById('nurseFields');

        function toggleRoleFields() {
            doctorFields.style.display = roleSelect.value === 'doctor' ? 'block' : 'none';
            nurseFields.style.display = roleSelect.value === 'nurse' ? 'block' : 'none';
        }

        roleSelect.addEventListener('change', toggleRoleFields);
        toggleRoleFields();
    </script>
</body>
</html>
