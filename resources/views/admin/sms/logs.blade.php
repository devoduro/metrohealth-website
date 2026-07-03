<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS Logs | Metro Health Admin</title>

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
        @section('page-title', 'SMS Logs')
        @include('admin.partials.topbar')

        <div class="container-fluid p-4">
            <div class="mb-3">
                <a href="{{ route('admin.sms.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Bulk SMS
                </a>
            </div>

            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-history me-2" style="color: #84a33f;"></i>SMS Logs</h5>
                </div>
                <div class="admin-card-body">
                    @if($logs->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Patient</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Sent At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($logs as $log)
                                <tr>
                                    <td>{{ $log->patient->full_name ?? '—' }}</td>
                                    <td>{{ $log->phone }}</td>
                                    <td><small>{{ Str::limit($log->message, 60) }}</small></td>
                                    <td><span class="badge bg-light text-dark border">{{ ucfirst($log->type) }}</span></td>
                                    <td>
                                        <span class="badge bg-{{ $log->status == 'sent' ? 'success' : 'danger' }}" title="{{ $log->response }}">{{ ucfirst($log->status) }}</span>
                                    </td>
                                    <td><small class="text-muted">{{ $log->created_at->format('M d, Y h:i A') }}</small></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $logs->links() }}
                    </div>
                    @else
                    <div class="text-center py-5 text-muted">
                        <i class="fas fa-sms fa-4x mb-3" style="color: #84a33f; opacity: 0.3;"></i>
                        <h5>No SMS logs yet</h5>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
