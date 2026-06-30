<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments Management | Metro Health Admin</title>
    
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
        <?php $__env->startSection('page-title', 'Appointments Management'); ?>
        <?php echo $__env->make('admin.partials.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="container-fluid p-4">
            <!-- Stats Cards -->
            <div class="row g-3 mb-4">
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h6 class="text-muted mb-2">Total Appointments</h6>
                            <h3 class="mb-0"><?php echo e($stats['total']); ?></h3>
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
                    <div class="card border-0 shadow-sm border-start border-success border-3">
                        <div class="card-body">
                            <h6 class="text-muted mb-2">Confirmed</h6>
                            <h3 class="mb-0 text-success"><?php echo e($stats['confirmed']); ?></h3>
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
            </div>

            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-calendar-check me-2" style="color: #84a33f;"></i>All Appointments</h5>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#filterModal">
                            <i class="fas fa-filter me-1"></i>Filters
                        </button>
                    </div>
                </div>
                <div class="admin-card-body">
                    <!-- Search and Filter Bar -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" id="searchInput" placeholder="Search by patient name, email, or phone...">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" id="statusFilter">
                                <option value="">All Status</option>
                                <option value="pending">Pending</option>
                                <option value="confirmed">Confirmed</option>
                                <option value="completed">Completed</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" id="serviceFilter">
                                <option value="">All Services</option>
                                <?php
                                    $services = \App\Models\ClinicAppointment::getServiceSchedules();
                                ?>
                                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serviceName => $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($serviceName); ?>"><?php echo e($serviceName); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <?php if($appointments->count() > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Patient</th>
                                    <th>Medical Service</th>
                                    <th>Service Fee</th>
                                    <th>Appointment Day & Time</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><strong class="text-muted">#<?php echo e($appointment->id); ?></strong></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-circle bg-primary text-white me-2" style="width: 35px; height: 35px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 600;">
                                                <?php echo e(strtoupper(substr($appointment->full_name, 0, 1))); ?>

                                            </div>
                                            <div>
                                                <strong><?php echo e($appointment->full_name); ?></strong><br>
                                                <small class="text-muted"><i class="fas fa-envelope me-1"></i><?php echo e($appointment->email); ?></small><br>
                                                <small class="text-muted"><i class="fas fa-phone me-1"></i><?php echo e($appointment->phone); ?></small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <i class="fas fa-stethoscope text-success me-1"></i>
                                            <strong><?php echo e($appointment->service_name); ?></strong>
                                            <?php if($appointment->notes): ?>
                                            <br><small class="text-muted"><?php echo e(Str::limit($appointment->notes, 50)); ?></small>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <strong class="text-success">GH¢ <?php echo e(number_format($appointment->service_fee, 2)); ?></strong>
                                    </td>
                                    <td>
                                        <strong><?php echo e($appointment->appointment_day); ?></strong><br>
                                        <small class="text-muted"><i class="far fa-clock me-1"></i><?php echo e($appointment->appointment_time); ?></small>
                                    </td>
                                    <td>
                                        <span class="badge bg-<?php echo e(($appointment->status ?? 'pending') == 'pending' ? 'warning' : (($appointment->status ?? 'pending') == 'confirmed' ? 'success' : (($appointment->status ?? 'pending') == 'completed' ? 'info' : 'secondary'))); ?>">
                                            <?php echo e(ucfirst($appointment->status ?? 'pending')); ?>

                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#appointmentModal<?php echo e($appointment->id); ?>" title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#statusModal<?php echo e($appointment->id); ?>" title="Update Status">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Appointment Detail Modal -->
                                <div class="modal fade" id="appointmentModal<?php echo e($appointment->id); ?>" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background: linear-gradient(135deg, #84a33f 0%, #6b8a32 100%);">
                                                <h5 class="modal-title text-white">
                                                    <i class="fas fa-calendar-check me-2"></i>Appointment #<?php echo e($appointment->id); ?>

                                                </h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row g-4">
                                                    <div class="col-md-6">
                                                        <h6 class="text-muted mb-3"><i class="fas fa-user me-2"></i>Patient Information</h6>
                                                        <p><strong>Name:</strong> <?php echo e($appointment->full_name); ?></p>
                                                        <p><strong>Email:</strong> <a href="mailto:<?php echo e($appointment->email); ?>"><?php echo e($appointment->email); ?></a></p>
                                                        <p><strong>Phone:</strong> <a href="tel:<?php echo e($appointment->phone); ?>"><?php echo e($appointment->phone); ?></a></p>
                                                        <?php if($appointment->address): ?>
                                                        <p><strong>Address:</strong> <?php echo e($appointment->address); ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6 class="text-muted mb-3"><i class="fas fa-stethoscope me-2"></i>Appointment Details</h6>
                                                        <p><strong>Service:</strong> <?php echo e($appointment->service_name); ?></p>
                                                        <p><strong>Service Fee:</strong> <span class="text-success fw-bold">GH¢ <?php echo e(number_format($appointment->service_fee, 2)); ?></span></p>
                                                        <p><strong>Day:</strong> <?php echo e($appointment->appointment_day); ?></p>
                                                        <p><strong>Time:</strong> <?php echo e($appointment->appointment_time); ?></p>
                                                        <p><strong>Status:</strong> 
                                                            <span class="badge bg-<?php echo e(($appointment->status ?? 'pending') == 'pending' ? 'warning' : (($appointment->status ?? 'pending') == 'confirmed' ? 'success' : (($appointment->status ?? 'pending') == 'completed' ? 'info' : 'secondary'))); ?>">
                                                                <?php echo e(ucfirst($appointment->status ?? 'pending')); ?>

                                                            </span>
                                                        </p>
                                                    </div>
                                                    <?php if($appointment->notes): ?>
                                                    <div class="col-12">
                                                        <h6 class="text-muted mb-3"><i class="fas fa-sticky-note me-2"></i>Patient Notes</h6>
                                                        <div class="alert alert-light"><?php echo e($appointment->notes); ?></div>
                                                    </div>
                                                    <?php endif; ?>
                                                    <div class="col-12">
                                                        <h6 class="text-muted mb-3"><i class="fas fa-clock me-2"></i>Booking Information</h6>
                                                        <p><strong>Booked on:</strong> <?php echo e($appointment->created_at->format('M d, Y h:i A')); ?></p>
                                                        <p><strong>Last updated:</strong> <?php echo e($appointment->updated_at->format('M d, Y h:i A')); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-success" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#statusModal<?php echo e($appointment->id); ?>">
                                                    <i class="fas fa-edit me-2"></i>Update Status
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Status Update Modal -->
                                <div class="modal fade" id="statusModal<?php echo e($appointment->id); ?>" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"><i class="fas fa-edit me-2"></i>Update Appointment Status</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <form action="<?php echo e(route('admin.bookings.update', $appointment->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PUT'); ?>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">Patient Name</label>
                                                        <input type="text" class="form-control" value="<?php echo e($appointment->full_name); ?>" readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">Service</label>
                                                        <input type="text" class="form-control" value="<?php echo e($appointment->service_name); ?>" readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">Appointment Status <span class="text-danger">*</span></label>
                                                        <select name="status" class="form-select" required>
                                                            <option value="pending" <?php echo e(($appointment->status ?? 'pending') == 'pending' ? 'selected' : ''); ?>>Pending</option>
                                                            <option value="confirmed" <?php echo e(($appointment->status ?? 'pending') == 'confirmed' ? 'selected' : ''); ?>>Confirmed</option>
                                                            <option value="completed" <?php echo e(($appointment->status ?? 'pending') == 'completed' ? 'selected' : ''); ?>>Completed</option>
                                                            <option value="cancelled" <?php echo e(($appointment->status ?? 'pending') == 'cancelled' ? 'selected' : ''); ?>>Cancelled</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fas fa-save me-2"></i>Update Status
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

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
                        <p>Appointments will appear here once patients book through the clinic appointments page.</p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Search and filter functionality
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const statusFilter = document.getElementById('statusFilter');
            const serviceFilter = document.getElementById('serviceFilter');
            const tableRows = document.querySelectorAll('table tbody tr:not(.modal)');

            function filterTable() {
                const searchTerm = searchInput.value.toLowerCase();
                const selectedStatus = statusFilter.value.toLowerCase();
                const selectedService = serviceFilter.value.toLowerCase();

                tableRows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    const statusBadge = row.querySelector('.badge');
                    const status = statusBadge ? statusBadge.textContent.toLowerCase().trim() : '';
                    
                    const matchesSearch = text.includes(searchTerm);
                    const matchesStatus = !selectedStatus || status === selectedStatus;
                    const matchesService = !selectedService || text.includes(selectedService);

                    if (matchesSearch && matchesStatus && matchesService) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            if (searchInput) searchInput.addEventListener('keyup', filterTable);
            if (statusFilter) statusFilter.addEventListener('change', filterTable);
            if (serviceFilter) serviceFilter.addEventListener('change', filterTable);
        });
    </script>
</body>
</html>
<?php /**PATH /home4/ptawiah/new.metrohealthgh.com/resources/views/admin/bookings.blade.php ENDPATH**/ ?>