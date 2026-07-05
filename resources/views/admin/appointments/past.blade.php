<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Past Appointments | Metro Health Admin</title>

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
        @section('page-title', 'Past Appointments')
        @include('admin.partials.topbar')

        <div class="container-fluid p-4">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-history me-2" style="color: #84a33f;"></i>Past Appointments</h5>
                    @unless(auth()->user()->isDoctor())
                    <a href="{{ route('admin.appointments.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Appointments
                    </a>
                    @endunless
                </div>
                <div class="admin-card-body">
                    <form method="GET" class="row g-3 mb-4">
                        <div class="col-md-4">
                            <select name="status" class="form-select" onchange="this.form.submit()">
                                <option value="">All Status</option>
                                <option value="scheduled" {{ request('status') == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>
                        @unless(auth()->user()->isDoctor())
                        <div class="col-md-5">
                            <select name="clinic_service_id" class="form-select" onchange="this.form.submit()">
                                <option value="">All Services</option>
                                @foreach($clinicServices as $clinicService)
                                <option value="{{ $clinicService->id }}" {{ request('clinic_service_id') == $clinicService->id ? 'selected' : '' }}>{{ $clinicService->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endunless
                        <div class="col-md-3">
                            <a href="{{ route('admin.appointments.past') }}" class="btn btn-outline-secondary w-100">Clear</a>
                        </div>
                    </form>

                    @if($appointments->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Patient</th>
                                    <th>Service</th>
                                    <th>Doctor</th>
                                    <th>Date & Time</th>
                                    <th>SMS</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $appointment)
                                <tr>
                                    <td><strong class="text-muted">#{{ $appointment->id }}</strong></td>
                                    <td>
                                        <strong>{{ $appointment->patient->full_name ?? '—' }}</strong><br>
                                        <small class="text-muted"><i class="fas fa-phone me-1"></i>{{ $appointment->patient->phone ?? '—' }}</small>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border">{{ $appointment->clinicService->name ?? '—' }}</span>
                                    </td>
                                    <td>
                                        {{ $appointment->doctor ? 'Dr. ' . $appointment->doctor->name : '—' }}
                                    </td>
                                    <td>
                                        <strong>{{ $appointment->appointment_date->format('M d, Y') }}</strong><br>
                                        <small class="text-muted"><i class="far fa-clock me-1"></i>{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('g:i A') }}</small>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $appointment->sms_status == 'sent' ? 'success' : ($appointment->sms_status == 'failed' ? 'danger' : 'secondary') }}">
                                            {{ ucfirst($appointment->sms_status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $appointment->status == 'scheduled' ? 'warning' : ($appointment->status == 'completed' ? 'info' : 'secondary') }}">
                                            {{ ucfirst($appointment->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <small>{{ $appointment->notes ?: '—' }}</small>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.appointments.edit', $appointment) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @unless(auth()->user()->isDoctor())
                                            <form action="{{ route('admin.appointments.destroy', $appointment) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this appointment?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            @endunless
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $appointments->links() }}
                    </div>
                    @else
                    <div class="text-center py-5 text-muted">
                        <i class="fas fa-history fa-4x mb-3" style="color: #84a33f; opacity: 0.3;"></i>
                        <h5>No past appointments</h5>
                        <p>Appointments will appear here once their scheduled date has passed.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
