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
    <link rel="stylesheet" href="<?php echo e(asset('css/ashlocs-custom.css')); ?>">
</head>
<body style="background: #f8f9fa;">
    
    <?php echo $__env->make('admin.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="admin-content">
        <?php $__env->startSection('page-title', 'Contact Messages'); ?>
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
                    <h5><i class="fas fa-envelope me-2"></i>Contact Messages 
                        <?php if($newCount > 0): ?>
                            <span class="badge bg-danger ms-2"><?php echo e($newCount); ?> New</span>
                        <?php endif; ?>
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
                                <?php $__empty_1 = true; $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr style="<?php echo e($message->status === 'new' ? 'background: #fff9e6;' : ''); ?>">
                                        <td>
                                            <?php if($message->status === 'new'): ?>
                                                <span class="badge bg-danger">New</span>
                                            <?php elseif($message->status === 'read'): ?>
                                                <span class="badge bg-info">Read</span>
                                            <?php else: ?>
                                                <span class="badge bg-success">Resolved</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <strong><?php echo e($message->name); ?></strong>
                                            <?php if($message->phone): ?>
                                                <br><small class="text-muted"><?php echo e($message->phone); ?></small>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($message->email); ?></td>
                                        <td><?php echo e(Str::limit($message->subject, 40)); ?></td>
                                        <td>
                                            <small><?php echo e($message->created_at->format('M d, Y')); ?></small><br>
                                            <small class="text-muted"><?php echo e($message->created_at->format('h:i A')); ?></small>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('admin.contact-messages.show', $message)); ?>" class="btn btn-sm btn-primary" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <form action="<?php echo e(route('admin.contact-messages.destroy', $message)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this message?');">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="6" class="text-center py-5">
                                            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                            <p class="text-muted">No contact messages yet</p>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <?php if($messages->hasPages()): ?>
                <div class="mt-4">
                    <?php echo e($messages->links()); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/metrohealth/resources/views/admin/contact-messages/index.blade.php ENDPATH**/ ?>