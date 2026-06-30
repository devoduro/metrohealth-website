<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Details | Metro Health Admin</title>
    
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
            <!-- Back Button -->
            <div class="mb-3">
                <a href="{{ route('admin.patients.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Patients
                </a>
            </div>

            <!-- Patient Information Card -->
            <div class="row g-4 mb-4">
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center">
                            <div class="avatar-circle bg-primary text-white mx-auto mb-3" style="width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2rem; font-weight: 600;">
                                {{ strtoupper(substr($patient->full_name, 0, 1)) }}
                            </div>
                            <h4 class="mb-1">{{ $patient->full_name }}</h4>
                            <p class="text-muted mb-3">Patient ID: #{{ $patient->id }}</p>
                            
                            <div class="text-start mt-4">
                                <div class="mb-3">
                                    <i class="fas fa-envelope text-muted me-2"></i>
                                    <a href="mailto:{{ $patient->email }}">{{ $patient->email }}</a>
                                </div>
                                <div class="mb-3">
                                    <i class="fas fa-phone text-muted me-2"></i>
                                    <a href="tel:{{ $patient->phone }}">{{ $patient->phone }}</a>
                                </div>
                                @if($patient->address)
                                <div class="mb-3">
                                    <i class="fas fa-map-marker-alt text-muted me-2"></i>
                                    {{ $patient->address }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <!-- Statistics Cards -->
                    <div class="row g-3">
                        <div class="col-md-3">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <h6 class="text-muted mb-2">Total Appointments</h6>
                                    <h3 class="mb-0">{{ $stats['total_appointments'] }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-0 shadow-sm border-start border-info border-3">
                                <div class="card-body">
                                    <h6 class="text-muted mb-2">Completed</h6>
                                    <h3 class="mb-0 text-info">{{ $stats['completed'] }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-0 shadow-sm border-start border-warning border-3">
                                <div class="card-body">
                                    <h6 class="text-muted mb-2">Pending</h6>
                                    <h3 class="mb-0 text-warning">{{ $stats['pending'] }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-0 shadow-sm border-start border-danger border-3">
                                <div class="card-body">
                                    <h6 class="text-muted mb-2">Cancelled</h6>
                                    <h3 class="mb-0 text-danger">{{ $stats['cancelled'] }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Appointment History -->
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-history me-2" style="color: #84a33f;"></i>Appointment History</h5>
                </div>
                <div class="admin-card-body">
                    @if($appointments->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Medical Service</th>
                                    <th>Appointment Day & Time</th>
                                    <th>Service Fee</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $appointment)
                                <tr>
                                    <td>
                                        <strong>{{ $appointment->created_at->format('M d, Y') }}</strong><br>
                                        <small class="text-muted">{{ $appointment->created_at->diffForHumans() }}</small>
                                    </td>
                                    <td>
                                        <i class="fas fa-stethoscope text-success me-1"></i>
                                        <strong>{{ $appointment->service_name }}</strong>
                                    </td>
                                    <td>
                                        <strong>{{ $appointment->appointment_day }}</strong><br>
                                        <small class="text-muted"><i class="far fa-clock me-1"></i>{{ $appointment->appointment_time }}</small>
                                    </td>
                                    <td>
                                        <strong class="text-success">GH¢ {{ number_format($appointment->service_fee, 2) }}</strong>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ ($appointment->status ?? 'pending') == 'pending' ? 'warning' : (($appointment->status ?? 'pending') == 'confirmed' ? 'success' : (($appointment->status ?? 'pending') == 'completed' ? 'info' : 'secondary')) }}">
                                            {{ ucfirst($appointment->status ?? 'pending') }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($appointment->notes)
                                        <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#notesModal{{ $appointment->id }}">
                                            <i class="fas fa-file-alt"></i> View
                                        </button>

                                        <!-- Notes Modal -->
                                        <div class="modal fade" id="notesModal{{ $appointment->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Appointment Notes</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>{{ $appointment->notes }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center py-5 text-muted">
                        <i class="fas fa-calendar-times fa-4x mb-3" style="color: #84a33f; opacity: 0.3;"></i>
                        <h5>No appointment history</h5>
                        <p>This patient hasn't made any appointments yet.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<style>
.avatar-circle {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
}
</style>
