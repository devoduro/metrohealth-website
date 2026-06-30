<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Messages | Metro Health Admin</title>
    
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
        @section('page-title', 'Contact Messages')
        @include('admin.partials.topbar')

        <div class="container-fluid p-4">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-envelope me-2"></i>Contact Messages 
                        @if($newCount > 0)
                            <span class="badge bg-danger ms-2">{{ $newCount }} New</span>
                        @endif
                    </h5>
                </div>
                <div class="admin-card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead style="background: #f8f9fa;">
                                <tr>
                                    <th style="width: 50px;">Status</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th style="width: 100px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($messages as $message)
                                    <tr style="{{ $message->status === 'new' ? 'background: #fff9e6;' : '' }}">
                                        <td>
                                            @if($message->status === 'new')
                                                <span class="badge bg-danger">New</span>
                                            @elseif($message->status === 'read')
                                                <span class="badge bg-info">Read</span>
                                            @else
                                                <span class="badge bg-success">Resolved</span>
                                            @endif
                                        </td>
                                        <td>
                                            <strong>{{ $message->name }}</strong>
                                            @if($message->phone)
                                                <br><small class="text-muted">{{ $message->phone }}</small>
                                            @endif
                                        </td>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ Str::limit($message->subject, 40) }}</td>
                                        <td>
                                            <small>{{ $message->created_at->format('M d, Y') }}</small><br>
                                            <small class="text-muted">{{ $message->created_at->format('h:i A') }}</small>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.contact-messages.show', $message) }}" class="btn btn-sm btn-primary" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <form action="{{ route('admin.contact-messages.destroy', $message) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this message?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-5">
                                            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                            <p class="text-muted">No contact messages yet</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @if($messages->hasPages())
                <div class="mt-4">
                    {{ $messages->links() }}
                </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
