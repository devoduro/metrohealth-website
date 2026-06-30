<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services Management | Metro Health Admin</title>
    
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
        <?php $__env->startSection('page-title', 'Services Management'); ?>
        <?php echo $__env->make('admin.partials.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="container-fluid p-4">
            <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>

            <!-- Statistics Cards -->
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avatar-icon bg-primary">
                                        <i class="fas fa-stethoscope text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h3 class="mb-0"><?php echo e($stats['total_services']); ?></h3>
                                    <p class="text-muted mb-0 small">Medical Services</p>
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
                                        <i class="fas fa-calendar-check text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h3 class="mb-0"><?php echo e($stats['total_appointments']); ?></h3>
                                    <p class="text-muted mb-0 small">Total Appointments</p>
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
                                    <div class="avatar-icon" style="background: #84a33f;">
                                        <i class="fas fa-money-bill-wave text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h3 class="mb-0">GH¢ <?php echo e(number_format($stats['total_revenue'], 2)); ?></h3>
                                    <p class="text-muted mb-0 small">Total Revenue</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Clinic Services Summary -->
            <div class="admin-card mb-4">
                <div class="admin-card-header">
                    <h5><i class="fas fa-hospital me-2" style="color: #84a33f;"></i>Clinic Services & Fees Summary</h5>
                </div>
                <div class="admin-card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="35%">Service Name</th>
                                    <th width="20%">Service Fee</th>
                                    <th width="15%">Appointments</th>
                                    <th width="15%">Revenue</th>
                                    <th width="10%">Schedule</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $index = 1; ?>
                                <?php $__currentLoopData = $serviceSchedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serviceName => $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><strong class="text-muted"><?php echo e($index++); ?></strong></td>
                                    <td>
                                        <div>
                                            <i class="fas fa-stethoscope text-success me-2"></i>
                                            <strong><?php echo e($serviceName); ?></strong>
                                        </div>
                                    </td>
                                    <td>
                                        <strong class="text-success" style="font-size: 1.1rem;">GH¢ <?php echo e(number_format($schedule['fee'], 2)); ?></strong>
                                    </td>
                                    <td>
                                        <span class="badge bg-info" style="font-size: 0.9rem;">
                                            <?php echo e($appointmentStats[$serviceName]['count']); ?> bookings
                                        </span>
                                    </td>
                                    <td>
                                        <strong class="text-primary">GH¢ <?php echo e(number_format($appointmentStats[$serviceName]['revenue'], 2)); ?></strong>
                                    </td>
                                    <td>
                                        <small class="text-muted">
                                            <?php if(is_array($schedule['days'])): ?>
                                                <?php echo e(implode(', ', array_slice($schedule['days'], 0, 2))); ?>

                                                <?php if(count($schedule['days']) > 2): ?>
                                                    <br>+<?php echo e(count($schedule['days']) - 2); ?> more
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php echo e($schedule['days']); ?>

                                            <?php endif; ?>
                                        </small>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot class="table-light">
                                <tr>
                                    <th colspan="3" class="text-end">TOTAL:</th>
                                    <th>
                                        <span class="badge bg-success" style="font-size: 0.9rem;">
                                            <?php echo e($stats['total_appointments']); ?> appointments
                                        </span>
                                    </th>
                                    <th>
                                        <strong class="text-success" style="font-size: 1.1rem;">
                                            GH¢ <?php echo e(number_format($stats['total_revenue'], 2)); ?>

                                        </strong>
                                    </th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Medical Services Table -->
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-stethoscope me-2" style="color: #84a33f;"></i>Medical Services</h5>
                    <a href="<?php echo e(route('admin.services.create')); ?>" class="btn btn-success">
                        <i class="fas fa-plus me-2"></i>Add New Service
                    </a>
                </div>
                <div class="admin-card-body">
                    <?php if($services->count() > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="5%">Icon</th>
                                    <th width="30%">Service Name</th>
                                    <th width="20%">Pricing</th>
                                    <th width="10%">Order</th>
                                    <th width="10%">Status</th>
                                    <th width="20%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><strong class="text-muted">#<?php echo e($service->id); ?></strong></td>
                                    <td>
                                        <div class="service-icon-wrapper">
                                            <i class="<?php echo e($service->icon ?? 'fas fa-stethoscope'); ?>" style="font-size: 1.8rem; color: #84a33f;"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <strong class="d-block mb-1"><?php echo e($service->title); ?></strong>
                                            <small class="text-muted"><?php echo e(Str::limit($service->description, 80)); ?></small>
                                        </div>
                                    </td>
                                    <td>
                                        <strong class="text-success" style="font-size: 1.05rem;"><?php echo e($service->getPriceRange()); ?></strong>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary" style="font-size: 0.85rem;"><?php echo e($service->order); ?></span>
                                    </td>
                                    <td>
                                        <span class="badge bg-<?php echo e($service->is_active ? 'success' : 'secondary'); ?>" style="font-size: 0.85rem;">
                                            <i class="fas fa-<?php echo e($service->is_active ? 'check-circle' : 'times-circle'); ?> me-1"></i>
                                            <?php echo e($service->is_active ? 'Active' : 'Inactive'); ?>

                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="<?php echo e(route('admin.services.edit', $service)); ?>" class="btn btn-sm btn-outline-primary" title="Edit Service">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="<?php echo e(route('admin.services.destroy', $service)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this medical service? This action cannot be undone.');">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete Service">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php else: ?>
                    <div class="text-center py-5 text-muted">
                        <i class="fas fa-stethoscope fa-4x mb-3" style="color: #84a33f; opacity: 0.3;"></i>
                        <h5>No medical services found</h5>
                        <p>Add your first medical service to get started.</p>
                        <a href="<?php echo e(route('admin.services.create')); ?>" class="btn btn-success mt-3">
                            <i class="fas fa-plus me-2"></i>Add First Service
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
<?php /**PATH /home4/ptawiah/new.metrohealthgh.com/resources/views/admin/services/index.blade.php ENDPATH**/ ?>