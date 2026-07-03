<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Accounts | Metro Health Admin</title>

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
        <?php $__env->startSection('page-title', 'Staff Accounts'); ?>
        <?php echo $__env->make('admin.partials.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="container-fluid p-4">
            <?php if(session('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i><?php echo e(session('error')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>

            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-user-shield me-2" style="color: #84a33f;"></i>Staff Accounts</h5>
                    <a href="<?php echo e(route('admin.staff.create')); ?>" class="btn btn-success">
                        <i class="fas fa-plus me-2"></i>Create Staff Account
                    </a>
                </div>
                <div class="admin-card-body">
                    <?php if($staff->count() > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Assigned Service(s)</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $staff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <strong><?php echo e($member->name); ?></strong>
                                        <?php if($member->doctor): ?>
                                        <br><small class="text-muted">Linked: Dr. <?php echo e($member->doctor->name); ?></small>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($member->email); ?></td>
                                    <td>
                                        <span class="badge bg-<?php echo e($member->getRoleBadgeColor()); ?>"><?php echo e(ucfirst($member->role)); ?></span>
                                    </td>
                                    <td>
                                        <?php $__empty_1 = true; $__currentLoopData = $member->clinicServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <span class="badge bg-light text-dark border"><?php echo e($service->name); ?></span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <span class="text-muted small">—</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <span class="badge bg-<?php echo e($member->is_active ? 'success' : 'secondary'); ?>">
                                            <?php echo e($member->is_active ? 'Active' : 'Inactive'); ?>

                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="<?php echo e(route('admin.staff.edit', $member)); ?>" class="btn btn-sm btn-outline-primary" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <?php if($member->id !== auth()->id()): ?>
                                            <form action="<?php echo e(route('admin.staff.destroy', $member)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Remove this staff account?');">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php else: ?>
                    <div class="text-center py-5 text-muted">
                        <i class="fas fa-user-shield fa-4x mb-3" style="color: #84a33f; opacity: 0.3;"></i>
                        <h5>No staff accounts found</h5>
                        <a href="<?php echo e(route('admin.staff.create')); ?>" class="btn btn-success mt-3">
                            <i class="fas fa-plus me-2"></i>Create First Staff Account
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\metrohealth-web\resources\views/admin/staff/index.blade.php ENDPATH**/ ?>