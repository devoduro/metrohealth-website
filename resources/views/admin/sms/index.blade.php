<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulk SMS | Metro Health Admin</title>

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
        @section('page-title', 'Bulk SMS')
        @include('admin.partials.topbar')

        <div class="container-fluid p-4">
            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            <!-- Welcome Banner -->
            <div class="alert border-0 shadow-sm mb-4" style="background: linear-gradient(135deg, #84a33f 0%, #6b8a32 100%);">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h4 class="text-white mb-1"><i class="fas fa-sms me-2"></i>Bulk SMS Manager</h4>
                        <p class="text-white-50 mb-0">Send SMS reminders to patients by date, week, month, or days left before their appointment</p>
                    </div>
                    <div class="text-white">
                        <i class="fas fa-paper-plane" style="font-size: 3rem; opacity: 0.3;"></i>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avatar-icon" style="background: #84a33f;">
                                        <i class="fas fa-wallet text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h3 class="mb-0">{{ $balance ?? 'N/A' }}</h3>
                                    <p class="text-muted mb-0 small">SMS Credit Balance</p>
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
                                        <i class="fas fa-check-circle text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h3 class="mb-0">{{ $stats['sent'] }}</h3>
                                    <p class="text-muted mb-0 small">SMS Sent</p>
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
                                    <div class="avatar-icon bg-danger">
                                        <i class="fas fa-times-circle text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h3 class="mb-0">{{ $stats['failed'] }}</h3>
                                    <p class="text-muted mb-0 small">SMS Failed</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-5">
                            <div class="mb-4">
                                <i class="fas fa-paper-plane fa-4x" style="color: #84a33f;"></i>
                            </div>
                            <h5 class="mb-3">Compose Bulk SMS</h5>
                            <p class="text-muted mb-4">Send a filtered SMS campaign to patients based on their appointments</p>
                            <a href="{{ route('admin.sms.create') }}" class="btn btn-success">
                                <i class="fas fa-edit me-2"></i>Compose Message
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <h6 class="mb-3"><i class="fas fa-vial me-2 text-warning"></i>Send Test SMS</h6>
                            <p class="text-muted small">Verify the gateway is working end-to-end by sending a message to your own number.</p>
                            <form action="{{ route('admin.sms.test') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <input type="text" name="test_phone" class="form-control" placeholder="Your phone number, e.g. 0241234567" required>
                                </div>
                                <div class="mb-3">
                                    <textarea name="test_message" class="form-control" rows="2" placeholder="Test message" required>This is a test message from Metro Health Hospital's SMS system.</textarea>
                                </div>
                                <button type="submit" class="btn btn-outline-warning">
                                    <i class="fas fa-paper-plane me-2"></i>Send Test SMS
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent SMS Log -->
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-history me-2" style="color: #84a33f;"></i>Recent SMS Activity</h5>
                    <a href="{{ route('admin.sms.logs') }}" class="btn btn-outline-secondary btn-sm">View All Logs</a>
                </div>
                <div class="admin-card-body">
                    @if($recentLogs->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Patient</th>
                                    <th>Phone</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Sent At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentLogs as $log)
                                <tr>
                                    <td>{{ $log->patient->full_name ?? '—' }}</td>
                                    <td>{{ $log->phone }}</td>
                                    <td><span class="badge bg-light text-dark border">{{ ucfirst($log->type) }}</span></td>
                                    <td>
                                        <span class="badge bg-{{ $log->status == 'sent' ? 'success' : 'danger' }}">{{ ucfirst($log->status) }}</span>
                                    </td>
                                    <td><small class="text-muted">{{ $log->created_at->format('M d, Y h:i A') }}</small></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center py-5 text-muted">
                        <i class="fas fa-sms fa-4x mb-3" style="color: #84a33f; opacity: 0.3;"></i>
                        <h5>No SMS activity yet</h5>
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
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8rem;
}
</style>
