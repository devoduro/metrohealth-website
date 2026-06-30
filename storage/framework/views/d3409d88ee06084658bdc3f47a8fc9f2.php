<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews Management | Metro Health Admin</title>
    
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
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Reviews Management</h1>
        <a href="<?php echo e(route('admin.reviews.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Review
        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">All Reviews (<?php echo e($reviews->total()); ?>)</h6>
            <div>
                <span class="badge bg-success"><?php echo e($reviews->where('is_approved', true)->count()); ?> Approved</span>
                <span class="badge bg-warning text-dark"><?php echo e($reviews->where('is_approved', false)->count()); ?> Pending</span>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">ID</th>
                            <th width="15%">Customer</th>
                            <th width="10%">Rating</th>
                            <th width="35%">Review</th>
                            <th width="10%">Status</th>
                            <th width="10%">Date</th>
                            <th width="15%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($review->id); ?></td>
                            <td>
                                <strong><?php echo e($review->customer_name); ?></strong>
                                <?php if($review->customer_email): ?>
                                <br><small class="text-muted"><?php echo e($review->customer_email); ?></small>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="stars">
                                    <?php for($i = 0; $i < $review->rating; $i++): ?>
                                        <i class="fas fa-star text-warning"></i>
                                    <?php endfor; ?>
                                    <?php for($i = $review->rating; $i < 5; $i++): ?>
                                        <i class="far fa-star text-warning"></i>
                                    <?php endfor; ?>
                                </div>
                                <small class="text-muted">(<?php echo e($review->rating); ?>/5)</small>
                            </td>
                            <td>
                                <p class="mb-0" style="max-height: 60px; overflow: hidden; text-overflow: ellipsis;">
                                    <?php echo e(Str::limit($review->review, 100)); ?>

                                </p>
                            </td>
                            <td>
                                <?php if($review->is_approved): ?>
                                    <span class="badge bg-success">
                                        <i class="fas fa-check"></i> Approved
                                    </span>
                                <?php else: ?>
                                    <span class="badge bg-warning text-dark">
                                        <i class="fas fa-clock"></i> Pending
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <small><?php echo e($review->created_at->format('M d, Y')); ?></small>
                                <br>
                                <small class="text-muted"><?php echo e($review->created_at->diffForHumans()); ?></small>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="<?php echo e(route('admin.reviews.edit', $review)); ?>" 
                                       class="btn btn-sm btn-info" 
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    
                                    <form action="<?php echo e(route('admin.reviews.toggle-approval', $review)); ?>" 
                                          method="POST" 
                                          class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PATCH'); ?>
                                        <button type="submit" 
                                                class="btn btn-sm <?php echo e($review->is_approved ? 'btn-warning' : 'btn-success'); ?>" 
                                                title="<?php echo e($review->is_approved ? 'Unapprove' : 'Approve'); ?>">
                                            <i class="fas fa-<?php echo e($review->is_approved ? 'times' : 'check'); ?>"></i>
                                        </button>
                                    </form>
                                    
                                    <form action="<?php echo e(route('admin.reviews.destroy', $review)); ?>" 
                                          method="POST" 
                                          class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete this review?');">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" 
                                                class="btn btn-sm btn-danger" 
                                                title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                <p class="text-muted">No reviews found.</p>
                                <a href="<?php echo e(route('admin.reviews.create')); ?>" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Add First Review
                                </a>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <?php if($reviews->hasPages()): ?>
            <div class="d-flex justify-content-center mt-4">
                <?php echo e($reviews->links()); ?>

            </div>
            <?php endif; ?>
        </div>
    </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH /home4/ptawiah/new.metrohealthgh.com/resources/views/admin/reviews/index.blade.php ENDPATH**/ ?>