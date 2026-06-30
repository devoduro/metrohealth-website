<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Message | Metro Health Admin</title>
    
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
        @section('page-title', 'View Contact Message')
        @include('admin.partials.topbar')

        <div class="container-fluid p-4">
            <div class="row">
                <div class="col-lg-8">
                    <div class="admin-card">
                        <div class="admin-card-header">
                            <h5><i class="fas fa-envelope-open me-2"></i>Contact Message</h5>
                            <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Back to Messages
                            </a>
                        </div>
                        <div class="admin-card-body">
                            <div class="mb-4 pb-4 border-bottom">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="text-muted small">From</label>
                                        <p class="mb-0"><strong>{{ $message->name }}</strong></p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-muted small">Email</label>
                                        <p class="mb-0">
                                            <a href="mailto:{{ $message->email }}">{{ $message->email }}</a>
                                        </p>
                                    </div>
                                    @if($message->phone)
                                    <div class="col-md-6 mb-3">
                                        <label class="text-muted small">Phone</label>
                                        <p class="mb-0">
                                            <a href="tel:{{ $message->phone }}">{{ $message->phone }}</a>
                                        </p>
                                    </div>
                                    @endif
                                    <div class="col-md-6 mb-3">
                                        <label class="text-muted small">Date</label>
                                        <p class="mb-0">{{ $message->created_at->format('M d, Y h:i A') }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="text-muted small">Subject</label>
                                <h4>{{ $message->subject }}</h4>
                            </div>

                            <div class="mb-4">
                                <label class="text-muted small">Message</label>
                                <div class="p-3" style="background: #f8f9fa; border-radius: 10px;">
                                    <p style="white-space: pre-wrap; margin: 0;">{{ $message->message }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Status Update -->
                    <div class="admin-card mb-4">
                        <div class="admin-card-header">
                            <h6><i class="fas fa-tasks me-2"></i>Update Status</h6>
                        </div>
                        <div class="admin-card-body">
                            <form action="{{ route('admin.contact-messages.update-status', $message) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select" required>
                                        <option value="new" {{ $message->status === 'new' ? 'selected' : '' }}>New</option>
                                        <option value="read" {{ $message->status === 'read' ? 'selected' : '' }}>Read</option>
                                        <option value="resolved" {{ $message->status === 'resolved' ? 'selected' : '' }}>Resolved</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Admin Notes</label>
                                    <textarea name="admin_notes" class="form-control" rows="4" placeholder="Add internal notes...">{{ $message->admin_notes }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-save me-2"></i>Update Status
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="admin-card">
                        <div class="admin-card-header">
                            <h6><i class="fas fa-bolt me-2"></i>Quick Actions</h6>
                        </div>
                        <div class="admin-card-body">
                            <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}" class="btn btn-outline-primary w-100 mb-2">
                                <i class="fas fa-reply me-2"></i>Reply via Email
                            </a>
                            @if($message->phone)
                            <a href="tel:{{ $message->phone }}" class="btn btn-outline-success w-100 mb-2">
                                <i class="fas fa-phone me-2"></i>Call {{ $message->name }}
                            </a>
                            @endif
                            <form action="{{ route('admin.contact-messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger w-100">
                                    <i class="fas fa-trash me-2"></i>Delete Message
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
