<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Management | Metro Health Admin</title>
    
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
            <!-- Stats Cards -->
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avatar-icon bg-primary">
                                        <i class="fas fa-users text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h3 class="mb-0">{{ $stats['total_patients'] }}</h3>
                                    <p class="text-muted mb-0 small">Total Patients</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avatar-icon bg-success">
                                        <i class="fas fa-user-plus text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h3 class="mb-0">{{ $stats['new_this_month'] }}</h3>
                                    <p class="text-muted mb-0 small">New This Month</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avatar-icon bg-info">
                                        <i class="fas fa-heartbeat text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h3 class="mb-0">{{ $stats['active_patients'] }}</h3>
                                    <p class="text-muted mb-0 small">Active Patients</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Patients Table -->
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-users me-2"></i>All Patients</h5>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.patients.export') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-download me-1"></i>Export CSV
                        </a>
                    </div>
                </div>
                <div class="admin-card-body">
                    <!-- Search Form -->
                    <form method="GET" class="mb-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" name="search" class="form-control" placeholder="Search by name, email, or phone..." value="{{ request('search') }}">
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search me-1"></i>Search
                                </button>
                                <a href="{{ route('admin.patients.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-redo me-1"></i>Reset
                                </a>
                            </div>
                        </div>
                    </form>

                    @if($patients->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Patient Name</th>
                                    <th>Contact Information</th>
                                    <th>Total Appointments</th>
                                    <th>Last Visit</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($patients as $patient)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-circle bg-primary text-white me-2">
                                                {{ strtoupper(substr($patient->full_name, 0, 1)) }}
                                            </div>
                                            <strong>{{ $patient->full_name }}</strong>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <i class="fas fa-envelope text-muted me-1"></i>{{ $patient->email }}<br>
                                            <i class="fas fa-phone text-muted me-1"></i>{{ $patient->phone }}
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-info">{{ $patient->total_appointments }} appointments</span>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($patient->last_visit)->format('M d, Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.patients.show', $patient->email) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye"></i> View Details
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $patients->links() }}
                    </div>
                    @else
                    <div class="text-center py-5 text-muted">
                        <i class="fas fa-users fa-4x mb-3" style="opacity: 0.3;"></i>
                        <h5>No patients found</h5>
                        <p>Patients will appear here once they book appointments</p>
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
.avatar-icon {
    width: 50px;
    height: 50px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

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
