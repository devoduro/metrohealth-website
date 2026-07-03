<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Management | Metro Health Admin</title>
    
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
            <!-- Stats Cards -->
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avatar-icon bg-primary">
                                        <i class="fas fa-users text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h3 class="mb-0"><?php echo e($stats['total_patients']); ?></h3>
                                    <p class="text-muted mb-0 small">Total Patients</p>
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
                                        <i class="fas fa-user-plus text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h3 class="mb-0"><?php echo e($stats['new_this_month']); ?></h3>
                                    <p class="text-muted mb-0 small">New This Month</p>
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
                                    <div class="avatar-icon bg-info">
                                        <i class="fas fa-heartbeat text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h3 class="mb-0"><?php echo e($stats['active_patients']); ?></h3>
                                    <p class="text-muted mb-0 small">Active Patients</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Registered Patients (internal appointment system) -->
            <div class="admin-card mb-4">
                <div class="admin-card-header">
                    <h5><i class="fas fa-address-book me-2"></i>Registered Patients</h5>
                    <div class="d-flex gap-2">
                        <a href="<?php echo e(route('admin.patients.import-form')); ?>" class="btn btn-success btn-sm">
                            <i class="fas fa-file-import me-1"></i>Import Patients
                        </a>
                    </div>
                </div>
                <div class="admin-card-body">
                    <p class="text-muted small">Patients registered directly (via import or internal appointment booking), with a name, phone, and optional address.</p>

                    <form method="GET" class="mb-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" name="registered_search" class="form-control" placeholder="Search by name, phone, or address..." value="<?php echo e(request('registered_search')); ?>">
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search me-1"></i>Search
                                </button>
                                <a href="<?php echo e(route('admin.patients.index')); ?>" class="btn btn-secondary">
                                    <i class="fas fa-redo me-1"></i>Reset
                                </a>
                            </div>
                        </div>
                    </form>

                    <?php if($registeredPatients->count() > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Patient Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Appointments</th>
                                    <th>Registered</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $registeredPatients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registeredPatient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-circle bg-primary text-white me-2">
                                                <?php echo e(strtoupper(substr($registeredPatient->full_name, 0, 1))); ?>

                                            </div>
                                            <strong><?php echo e($registeredPatient->full_name); ?></strong>
                                        </div>
                                    </td>
                                    <td><i class="fas fa-phone text-muted me-1"></i><?php echo e($registeredPatient->phone); ?></td>
                                    <td><?php echo e($registeredPatient->address ?: '—'); ?></td>
                                    <td><span class="badge bg-info"><?php echo e($registeredPatient->appointments_count); ?></span></td>
                                    <td><small class="text-muted"><?php echo e($registeredPatient->created_at->format('M d, Y')); ?></small></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        <?php echo e($registeredPatients->appends(['registered_search' => request('registered_search')])->links()); ?>

                    </div>
                    <?php else: ?>
                    <div class="text-center py-4 text-muted">
                        <i class="fas fa-address-book fa-3x mb-3" style="opacity: 0.3;"></i>
                        <h6>No registered patients yet</h6>
                        <p class="small">Import a CSV or book an internal appointment to add one.</p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Patients Table -->
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-users me-2"></i>Public Booking Patients</h5>
                    <div class="d-flex gap-2">
                        <a href="<?php echo e(route('admin.patients.export')); ?>" class="btn btn-success btn-sm">
                            <i class="fas fa-download me-1"></i>Export CSV
                        </a>
                    </div>
                </div>
                <div class="admin-card-body">
                    <!-- Search Form -->
                    <form method="GET" class="mb-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" name="search" class="form-control" placeholder="Search by name, email, or phone..." value="<?php echo e(request('search')); ?>">
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search me-1"></i>Search
                                </button>
                                <a href="<?php echo e(route('admin.patients.index')); ?>" class="btn btn-secondary">
                                    <i class="fas fa-redo me-1"></i>Reset
                                </a>
                            </div>
                        </div>
                    </form>

                    <?php if($patients->count() > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Patient Name</th>
                                    <th>Contact Information</th>
                                    <th>Total Appointments</th>
                                    <th>Last Visit</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-circle bg-primary text-white me-2">
                                                <?php echo e(strtoupper(substr($patient->full_name, 0, 1))); ?>

                                            </div>
                                            <strong><?php echo e($patient->full_name); ?></strong>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <i class="fas fa-envelope text-muted me-1"></i><?php echo e($patient->email); ?><br>
                                            <i class="fas fa-phone text-muted me-1"></i><?php echo e($patient->phone); ?>

                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-info"><?php echo e($patient->total_appointments); ?> appointments</span>
                                    </td>
                                    <td><?php echo e(\Carbon\Carbon::parse($patient->last_visit)->format('M d, Y')); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('admin.patients.show', $patient->email)); ?>" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye"></i> View Details
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        <?php echo e($patients->links()); ?>

                    </div>
                    <?php else: ?>
                    <div class="text-center py-5 text-muted">
                        <i class="fas fa-users fa-4x mb-3" style="opacity: 0.3;"></i>
                        <h5>No patients found</h5>
                        <p>Patients will appear here once they book appointments</p>
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
    width: 50px;
    height: 50px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

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
<?php /**PATH C:\xampp\htdocs\metrohealth-web\resources\views/admin/patients/index.blade.php ENDPATH**/ ?>