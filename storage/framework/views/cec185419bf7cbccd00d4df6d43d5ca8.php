<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Details | Metro Health Admin</title>
    
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
            <!-- Back Button -->
            <div class="mb-3">
                <a href="<?php echo e(route('admin.patients.index')); ?>" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Patients
                </a>
            </div>

            <!-- Patient Information Card -->
            <div class="row g-4 mb-4">
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center">
                            <div class="avatar-circle bg-primary text-white mx-auto mb-3" style="width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2rem; font-weight: 600;">
                                <?php echo e(strtoupper(substr($patient->full_name, 0, 1))); ?>

                            </div>
                            <h4 class="mb-1"><?php echo e($patient->full_name); ?></h4>
                            <p class="text-muted mb-3">Patient ID: #<?php echo e($patient->id); ?></p>
                            
                            <div class="text-start mt-4">
                                <div class="mb-3">
                                    <i class="fas fa-envelope text-muted me-2"></i>
                                    <a href="mailto:<?php echo e($patient->email); ?>"><?php echo e($patient->email); ?></a>
                                </div>
                                <div class="mb-3">
                                    <i class="fas fa-phone text-muted me-2"></i>
                                    <a href="tel:<?php echo e($patient->phone); ?>"><?php echo e($patient->phone); ?></a>
                                </div>
                                <?php if($patient->address): ?>
                                <div class="mb-3">
                                    <i class="fas fa-map-marker-alt text-muted me-2"></i>
                                    <?php echo e($patient->address); ?>

                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <!-- Statistics Cards -->
                    <div class="row g-3">
                        <div class="col-md-3">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <h6 class="text-muted mb-2">Total Appointments</h6>
                                    <h3 class="mb-0"><?php echo e($stats['total_appointments']); ?></h3>
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
                            <div class="card border-0 shadow-sm border-start border-warning border-3">
                                <div class="card-body">
                                    <h6 class="text-muted mb-2">Pending</h6>
                                    <h3 class="mb-0 text-warning"><?php echo e($stats['pending']); ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-0 shadow-sm border-start border-danger border-3">
                                <div class="card-body">
                                    <h6 class="text-muted mb-2">Cancelled</h6>
                                    <h3 class="mb-0 text-danger"><?php echo e($stats['cancelled']); ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Appointment History -->
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-history me-2" style="color: #84a33f;"></i>Appointment History</h5>
                </div>
                <div class="admin-card-body">
                    <?php if($appointments->count() > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Medical Service</th>
                                    <th>Appointment Day & Time</th>
                                    <th>Service Fee</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <strong><?php echo e($appointment->created_at->format('M d, Y')); ?></strong><br>
                                        <small class="text-muted"><?php echo e($appointment->created_at->diffForHumans()); ?></small>
                                    </td>
                                    <td>
                                        <i class="fas fa-stethoscope text-success me-1"></i>
                                        <strong><?php echo e($appointment->service_name); ?></strong>
                                    </td>
                                    <td>
                                        <strong><?php echo e($appointment->appointment_day); ?></strong><br>
                                        <small class="text-muted"><i class="far fa-clock me-1"></i><?php echo e($appointment->appointment_time); ?></small>
                                    </td>
                                    <td>
                                        <strong class="text-success">GH¢ <?php echo e(number_format($appointment->service_fee, 2)); ?></strong>
                                    </td>
                                    <td>
                                        <span class="badge bg-<?php echo e(($appointment->status ?? 'pending') == 'pending' ? 'warning' : (($appointment->status ?? 'pending') == 'confirmed' ? 'success' : (($appointment->status ?? 'pending') == 'completed' ? 'info' : 'secondary'))); ?>">
                                            <?php echo e(ucfirst($appointment->status ?? 'pending')); ?>

                                        </span>
                                    </td>
                                    <td>
                                        <?php if($appointment->notes): ?>
                                        <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#notesModal<?php echo e($appointment->id); ?>">
                                            <i class="fas fa-file-alt"></i> View
                                        </button>

                                        <!-- Notes Modal -->
                                        <div class="modal fade" id="notesModal<?php echo e($appointment->id); ?>" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Appointment Notes</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><?php echo e($appointment->notes); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php else: ?>
                                        <span class="text-muted">-</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php else: ?>
                    <div class="text-center py-5 text-muted">
                        <i class="fas fa-calendar-times fa-4x mb-3" style="color: #84a33f; opacity: 0.3;"></i>
                        <h5>No appointment history</h5>
                        <p>This patient hasn't made any appointments yet.</p>
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
.avatar-circle {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
}
</style>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/metrohealth/resources/views/admin/patients/show.blade.php ENDPATH**/ ?>