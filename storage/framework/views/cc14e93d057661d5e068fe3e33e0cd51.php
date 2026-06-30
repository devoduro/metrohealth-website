<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Metro Health</title>
    
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
            <!-- Welcome Banner -->
            <div class="alert alert-success border-0 shadow-sm mb-4" style="background: linear-gradient(135deg, #84a33f 0%, #6b8a32 100%);">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h4 class="text-white mb-1"><i class="fas fa-hospital me-2"></i>Welcome to Metro Health Admin</h4>
                        <p class="text-white-50 mb-0">Manage appointments, patients, and medical services efficiently</p>
                    </div>
                    <div class="text-white">
                        <i class="fas fa-heartbeat" style="font-size: 3rem; opacity: 0.3;"></i>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row g-4 mb-4">
                <div class="col-md-3">
                    <div class="admin-stat-card">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="stat-info">
                            <h3><?php echo e($stats['total_appointments']); ?></h3>
                            <p>Total Appointments</p>
                            <small class="text-warning"><i class="fas fa-clock me-1"></i><?php echo e($stats['pending_appointments']); ?> pending</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="admin-stat-card">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-info">
                            <h3><?php echo e($stats['total_patients']); ?></h3>
                            <p>Total Patients</p>
                            <small class="text-success"><i class="fas fa-user-plus me-1"></i><?php echo e($stats['new_patients_month']); ?> this month</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="admin-stat-card">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                            <i class="fas fa-stethoscope"></i>
                        </div>
                        <div class="stat-info">
                            <h3><?php echo e($stats['total_services']); ?></h3>
                            <p>Medical Services</p>
                            <small class="text-muted"><i class="fas fa-check-circle me-1"></i>Active services</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="admin-stat-card">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #84a33f 0%, #6b8a32 100%);">
                            <i class="fas fa-check-double"></i>
                        </div>
                        <div class="stat-info">
                            <h3><?php echo e($stats['completed_appointments']); ?></h3>
                            <p>Completed</p>
                            <small class="text-muted"><i class="fas fa-chart-line me-1"></i>All time</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <!-- Recent Appointments -->
                <div class="col-lg-8">
                    <div class="admin-card">
                        <div class="admin-card-header">
                            <h5><i class="fas fa-calendar-alt me-2"></i>Recent Appointments</h5>
                            <a href="<?php echo e(route('admin.bookings')); ?>" class="btn btn-sm btn-outline-primary">View All</a>
                        </div>
                        <div class="admin-card-body">
                            <?php if($recent_appointments->count() > 0): ?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Patient</th>
                                            <th>Service</th>
                                            <th>Date & Time</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $recent_appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-circle bg-primary text-white me-2" style="width: 35px; height: 35px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 600;">
                                                        <?php echo e(strtoupper(substr($appointment->full_name, 0, 1))); ?>

                                                    </div>
                                                    <div>
                                                        <strong><?php echo e($appointment->full_name); ?></strong><br>
                                                        <small class="text-muted"><?php echo e($appointment->phone); ?></small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <i class="fas fa-stethoscope text-success me-1"></i>
                                                <?php echo e($appointment->service_name); ?>

                                            </td>
                                            <td>
                                                <strong><?php echo e($appointment->appointment_day); ?></strong><br>
                                                <small class="text-muted"><i class="far fa-clock me-1"></i><?php echo e($appointment->appointment_time); ?></small>
                                            </td>
                                            <td>
                                                <span class="badge bg-<?php echo e($appointment->status == 'pending' ? 'warning' : ($appointment->status == 'confirmed' ? 'success' : ($appointment->status == 'completed' ? 'info' : 'secondary'))); ?>">
                                                    <?php echo e(ucfirst($appointment->status ?? 'pending')); ?>

                                                </span>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('admin.bookings')); ?>" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php else: ?>
                            <div class="text-center py-5 text-muted">
                                <i class="fas fa-calendar-times fa-4x mb-3" style="opacity: 0.3;"></i>
                                <h6>No appointments yet</h6>
                                <p class="small">Appointments will appear here once patients book</p>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Appointments & Quick Stats -->
                <div class="col-lg-4">
                    <!-- Upcoming Appointments -->
                    <div class="admin-card mb-4">
                        <div class="admin-card-header">
                            <h6><i class="fas fa-clock me-2"></i>Upcoming Today</h6>
                        </div>
                        <div class="admin-card-body">
                            <?php if(isset($upcoming_appointments) && $upcoming_appointments->count() > 0): ?>
                            <div class="list-group list-group-flush">
                                <?php $__currentLoopData = $upcoming_appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="list-group-item px-0">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <strong class="d-block"><?php echo e($appointment->full_name); ?></strong>
                                            <small class="text-muted"><?php echo e($appointment->service_name); ?></small>
                                        </div>
                                        <div class="text-end">
                                            <small class="d-block text-primary"><?php echo e($appointment->appointment_time); ?></small>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <?php else: ?>
                            <div class="text-center py-3 text-muted">
                                <i class="fas fa-calendar-check fa-2x mb-2" style="opacity: 0.3;"></i>
                                <p class="small mb-0">No upcoming appointments</p>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="admin-card">
                        <div class="admin-card-header">
                            <h6><i class="fas fa-bolt me-2"></i>Quick Actions</h6>
                        </div>
                        <div class="admin-card-body">
                            <div class="d-grid gap-2">
                                <a href="<?php echo e(route('admin.bookings')); ?>" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-calendar-plus me-2"></i>View Appointments
                                </a>
                                <a href="<?php echo e(route('admin.patients.index')); ?>" class="btn btn-outline-success btn-sm">
                                    <i class="fas fa-users me-2"></i>Manage Patients
                                </a>
                                <a href="<?php echo e(route('admin.emails.index')); ?>" class="btn btn-outline-info btn-sm">
                                    <i class="fas fa-envelope me-2"></i>Send Email Campaign
                                </a>
                                <a href="<?php echo e(route('admin.services.index')); ?>" class="btn btn-outline-warning btn-sm">
                                    <i class="fas fa-stethoscope me-2"></i>Manage Services
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH /home4/ptawiah/new.metrohealthgh.com/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>