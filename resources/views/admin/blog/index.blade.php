<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News & Articles Management | Metro Health Admin</title>
    
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
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-newspaper me-2"></i>All News & Articles</h5>
                    <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Add New Article
                    </a>
                </div>
                <div class="admin-card-body">
                    @if($posts->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th>Published</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                <tr>
                                    <td><strong>#{{ $post->id }}</strong></td>
                                    <td>
                                        @if($post->image)
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                                        @else
                                        <div style="width: 60px; height: 60px; background: #f0f0f0; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-newspaper" style="color: #ccc;"></i>
                                        </div>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ Str::limit($post->title, 50) }}</strong><br>
                                        <small class="text-muted">{{ Str::limit($post->excerpt, 60) }}</small>
                                    </td>
                                    <td>
                                        @if($post->category)
                                        <span class="badge bg-purple">{{ $post->category }}</span>
                                        @else
                                        <span class="badge bg-secondary">Uncategorized</span>
                                        @endif
                                    </td>
                                    <td>{{ $post->author }}</td>
                                    <td>
                                        @if($post->published_at)
                                        {{ $post->published_at->format('M d, Y') }}<br>
                                        <small class="text-muted">{{ $post->published_at->format('h:i A') }}</small>
                                        @else
                                        <span class="text-muted">Not published</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.blog.toggle-publish', $post) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm {{ $post->published ? 'btn-success' : 'btn-secondary' }}">
                                                <i class="fas fa-{{ $post->published ? 'check-circle' : 'circle' }}"></i>
                                                {{ $post->published ? 'Published' : 'Draft' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.blog.edit', $post) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.blog.destroy', $post) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this article?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $posts->links() }}
                    </div>
                    @else
                    <div class="text-center py-5 text-muted">
                        <i class="fas fa-newspaper fa-3x mb-3"></i>
                        <p>No articles yet. <a href="{{ route('admin.blog.create') }}">Create your first article</a></p>
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
.bg-purple {
    background-color: #a8207a !important;
}
</style>
