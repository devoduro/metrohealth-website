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
    <link rel="stylesheet" href="<?php echo e(asset('css/ashlocs-custom.css')); ?>">
</head>
<body style="background: #f8f9fa;">
    
    <?php echo $__env->make('admin.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="admin-content">
        <?php echo $__env->make('admin.partials.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="container-fluid p-4">
            <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>

            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-newspaper me-2"></i>All News & Articles</h5>
                    <a href="<?php echo e(route('admin.blog.create')); ?>" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Add New Article
                    </a>
                </div>
                <div class="admin-card-body">
                    <?php if($posts->count() > 0): ?>
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
                                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><strong>#<?php echo e($post->id); ?></strong></td>
                                    <td>
                                        <?php if($post->image): ?>
                                        <img src="<?php echo e(asset('storage/' . $post->image)); ?>" alt="<?php echo e($post->title); ?>" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                                        <?php else: ?>
                                        <div style="width: 60px; height: 60px; background: #f0f0f0; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-newspaper" style="color: #ccc;"></i>
                                        </div>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <strong><?php echo e(Str::limit($post->title, 50)); ?></strong><br>
                                        <small class="text-muted"><?php echo e(Str::limit($post->excerpt, 60)); ?></small>
                                    </td>
                                    <td>
                                        <?php if($post->category): ?>
                                        <span class="badge bg-purple"><?php echo e($post->category); ?></span>
                                        <?php else: ?>
                                        <span class="badge bg-secondary">Uncategorized</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($post->author); ?></td>
                                    <td>
                                        <?php if($post->published_at): ?>
                                        <?php echo e($post->published_at->format('M d, Y')); ?><br>
                                        <small class="text-muted"><?php echo e($post->published_at->format('h:i A')); ?></small>
                                        <?php else: ?>
                                        <span class="text-muted">Not published</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <form action="<?php echo e(route('admin.blog.toggle-publish', $post)); ?>" method="POST" class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn btn-sm <?php echo e($post->published ? 'btn-success' : 'btn-secondary'); ?>">
                                                <i class="fas fa-<?php echo e($post->published ? 'check-circle' : 'circle'); ?>"></i>
                                                <?php echo e($post->published ? 'Published' : 'Draft'); ?>

                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('admin.blog.edit', $post)); ?>" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="<?php echo e(route('admin.blog.destroy', $post)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this article?');">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        <?php echo e($posts->links()); ?>

                    </div>
                    <?php else: ?>
                    <div class="text-center py-5 text-muted">
                        <i class="fas fa-newspaper fa-3x mb-3"></i>
                        <p>No articles yet. <a href="<?php echo e(route('admin.blog.create')); ?>">Create your first article</a></p>
                    </div>
                    <?php endif; ?>
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
<?php /**PATH /home4/ptawiah/new.metrohealthgh.com/resources/views/admin/blog/index.blade.php ENDPATH**/ ?>