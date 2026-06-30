<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Campaigns | Metro Health Admin</title>
    
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
        <?php $__env->startSection('page-title', 'Email Campaigns'); ?>
        <?php echo $__env->make('admin.partials.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="container-fluid p-4">
            <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i><?php echo e(session('error')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>

            <!-- Welcome Banner -->
            <div class="alert alert-info border-0 shadow-sm mb-4" style="background: linear-gradient(135deg, #84a33f 0%, #6b8a32 100%);">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h4 class="text-white mb-1"><i class="fas fa-envelope me-2"></i>Email Campaign Manager</h4>
                        <p class="text-white-50 mb-0">Send bulk emails to patients based on medical services or custom lists</p>
                    </div>
                    <div class="text-white">
                        <i class="fas fa-paper-plane" style="font-size: 3rem; opacity: 0.3;"></i>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row g-4 mb-4">
                <div class="col-md-6">
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
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avatar-icon bg-success">
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
            </div>

            <!-- Campaign Options -->
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-5">
                            <div class="mb-4">
                                <i class="fas fa-users fa-4x" style="color: #84a33f;"></i>
                            </div>
                            <h5 class="mb-3">Send to All Patients</h5>
                            <p class="text-muted mb-4">Send an email campaign to all registered patients in the system</p>
                            <a href="<?php echo e(route('admin.emails.create')); ?>?type=all" class="btn btn-success">
                                <i class="fas fa-paper-plane me-2"></i>Create Campaign
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-5">
                            <div class="mb-4">
                                <i class="fas fa-stethoscope fa-4x" style="color: #84a33f;"></i>
                            </div>
                            <h5 class="mb-3">Send by Medical Service</h5>
                            <p class="text-muted mb-4">Target patients who booked specific medical services</p>
                            <a href="<?php echo e(route('admin.emails.create')); ?>?type=service" class="btn btn-success">
                                <i class="fas fa-filter me-2"></i>Filter by Service
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-5">
                            <div class="mb-4">
                                <i class="fas fa-list fa-4x" style="color: #84a33f;"></i>
                            </div>
                            <h5 class="mb-3">Custom Email List</h5>
                            <p class="text-muted mb-4">Send to a custom list of email addresses</p>
                            <a href="<?php echo e(route('admin.emails.create')); ?>?type=custom" class="btn btn-success">
                                <i class="fas fa-edit me-2"></i>Custom List
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tips Section -->
            <div class="card border-0 shadow-sm mt-4">
                <div class="card-body">
                    <h5 class="mb-3"><i class="fas fa-lightbulb me-2 text-warning"></i>Email Campaign Tips</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Keep subject lines clear and concise</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Personalize your message when possible</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Include a clear call-to-action</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Preview before sending to all recipients</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Send at appropriate times (avoid late nights)</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Track campaign results for improvement</li>
                            </ul>
                        </div>
                    </div>
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
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/metrohealth/resources/views/admin/emails/index.blade.php ENDPATH**/ ?>