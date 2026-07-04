<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internal Appointments | Metro Health Admin</title>

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
        <?php $__env->startSection('page-title', 'Internal Appointments'); ?>
        <?php echo $__env->make('admin.partials.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="container-fluid p-4">
            <?php if(session('warning')): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i><?php echo e(session('warning')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>

            <!-- Stats Cards -->
            <div class="row g-3 mb-4">
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h6 class="text-muted mb-2">Total</h6>
                            <h3 class="mb-0"><?php echo e($stats['total']); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm border-start border-warning border-3">
                        <div class="card-body">
                            <h6 class="text-muted mb-2">Scheduled</h6>
                            <h3 class="mb-0 text-warning"><?php echo e($stats['scheduled']); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm border-start border-info border-3">
                        <div class="card-body">
                            <h6 class="text-muted mb-2">Completed</h6>
                            <h3 class="mb-0 text-info"><?php echo e($stats['completed']); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm border-start border-secondary border-3">
                        <div class="card-body">
                            <h6 class="text-muted mb-2">Cancelled</h6>
                            <h3 class="mb-0 text-secondary"><?php echo e($stats['cancelled']); ?></h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-calendar-check me-2" style="color: #84a33f;"></i>Internal Appointments</h5>
                    <a href="<?php echo e(route('admin.appointments.create')); ?>" class="btn btn-success">
                        <i class="fas fa-plus me-2"></i>Book Appointment
                    </a>
                </div>
                <div class="admin-card-body">
                    <form method="GET" class="row g-3 mb-4">
                        <div class="col-md-3">
                            <select name="status" class="form-select" onchange="this.form.submit()">
                                <option value="">All Status</option>
                                <option value="scheduled" <?php echo e(request('status') == 'scheduled' ? 'selected' : ''); ?>>Scheduled</option>
                                <option value="completed" <?php echo e(request('status') == 'completed' ? 'selected' : ''); ?>>Completed</option>
                                <option value="cancelled" <?php echo e(request('status') == 'cancelled' ? 'selected' : ''); ?>>Cancelled</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="clinic_service_id" class="form-select" onchange="this.form.submit()">
                                <option value="">All Services</option>
                                <?php $__currentLoopData = $clinicServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clinicService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($clinicService->id); ?>" <?php echo e(request('clinic_service_id') == $clinicService->id ? 'selected' : ''); ?>><?php echo e($clinicService->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="date" name="date" class="form-control" value="<?php echo e(request('date')); ?>" onchange="this.form.submit()">
                        </div>
                        <div class="col-md-2">
                            <a href="<?php echo e(route('admin.appointments.index')); ?>" class="btn btn-outline-secondary w-100">Clear</a>
                        </div>
                    </form>

                    <?php if($appointments->count() > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Patient</th>
                                    <th>Service</th>
                                    <th>Doctor</th>
                                    <th>Date & Time</th>
                                    <th>SMS</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><strong class="text-muted">#<?php echo e($appointment->id); ?></strong></td>
                                    <td>
                                        <strong><?php echo e($appointment->patient->full_name ?? '—'); ?></strong><br>
                                        <small class="text-muted"><i class="fas fa-phone me-1"></i><?php echo e($appointment->patient->phone ?? '—'); ?></small>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border"><?php echo e($appointment->clinicService->name ?? '—'); ?></span>
                                    </td>
                                    <td>
                                        <?php echo e($appointment->doctor ? 'Dr. ' . $appointment->doctor->name : '—'); ?>

                                    </td>
                                    <td>
                                        <strong><?php echo e($appointment->appointment_date->format('M d, Y')); ?></strong><br>
                                        <small class="text-muted"><i class="far fa-clock me-1"></i><?php echo e(\Carbon\Carbon::parse($appointment->appointment_time)->format('g:i A')); ?></small>
                                    </td>
                                    <td>
                                        <span class="badge bg-<?php echo e($appointment->sms_status == 'sent' ? 'success' : ($appointment->sms_status == 'failed' ? 'danger' : 'secondary')); ?>">
                                            <?php echo e(ucfirst($appointment->sms_status)); ?>

                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-<?php echo e($appointment->status == 'scheduled' ? 'warning' : ($appointment->status == 'completed' ? 'info' : 'secondary')); ?>">
                                            <?php echo e(ucfirst($appointment->status)); ?>

                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="<?php echo e(route('admin.appointments.edit', $appointment)); ?>" class="btn btn-sm btn-outline-primary" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="<?php echo e(route('admin.appointments.destroy', $appointment)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Delete this appointment?');">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        <?php echo e($appointments->links()); ?>

                    </div>
                    <?php else: ?>
                    <div class="text-center py-5 text-muted">
                        <i class="fas fa-calendar-times fa-4x mb-3" style="color: #84a33f; opacity: 0.3;"></i>
                        <h5>No appointments found</h5>
                        <a href="<?php echo e(route('admin.appointments.create')); ?>" class="btn btn-success mt-3">
                            <i class="fas fa-plus me-2"></i>Book First Appointment
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
<?php /**PATH C:\xampp\htdocs\metrohealth-web\resources\views/admin/appointments/index.blade.php ENDPATH**/ ?>