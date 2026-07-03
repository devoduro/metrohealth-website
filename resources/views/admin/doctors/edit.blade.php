<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Doctor | Metro Health Admin</title>

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
        @section('page-title', 'Edit Doctor')
        @include('admin.partials.topbar')

        <div class="container-fluid p-4">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-edit me-2"></i>Edit Doctor: Dr. {{ $doctor->name }}</h5>
                    <a href="{{ route('admin.doctors.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Doctors
                    </a>
                </div>
                <div class="admin-card-body">
                    <form action="{{ route('admin.doctors.update', $doctor) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-4">
                            <div class="col-md-8">
                                <label class="form-label">Doctor Name *</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $doctor->name) }}" required>
                                @error('name')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">&nbsp;</label>
                                <div class="form-check">
                                    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" {{ old('is_active', $doctor->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Active</label>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <label class="form-label">Clinic Service *</label>
                                <select name="clinic_service_id" class="form-select" required>
                                    <option value="">Choose a service...</option>
                                    @foreach($clinicServices as $clinicService)
                                    <option value="{{ $clinicService->id }}" {{ old('clinic_service_id', $doctor->clinic_service_id) == $clinicService->id ? 'selected' : '' }}>{{ $clinicService->name }}</option>
                                    @endforeach
                                </select>
                                @error('clinic_service_id')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold">Operating Days</label>
                                <p class="text-muted small">Days this doctor is available. Leave blank if unspecified.</p>
                                <div class="d-flex flex-wrap gap-3">
                                    @foreach(\App\Models\Doctor::weekdays() as $day)
                                    <div class="form-check">
                                        <input type="checkbox" name="days[]" value="{{ $day }}" class="form-check-input" id="day{{ $day }}"
                                            {{ in_array($day, old('days', $doctor->days ?? [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="day{{ $day }}">{{ $day }}</label>
                                    </div>
                                    @endforeach
                                </div>
                                @error('days')<span class="text-danger small d-block">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-save me-2"></i>Update Doctor
                                </button>
                                <a href="{{ route('admin.doctors.index') }}" class="btn btn-secondary btn-lg">Cancel</a>
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
