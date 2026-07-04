<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Clinic Service | Metro Health Admin</title>

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
        <?php $__env->startSection('page-title', 'Edit Clinic Service'); ?>
        <?php echo $__env->make('admin.partials.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="container-fluid p-4">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-edit me-2"></i>Edit Clinic Service: <?php echo e($clinicService->name); ?></h5>
                    <a href="<?php echo e(route('admin.clinic-services.index')); ?>" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Clinic Services
                    </a>
                </div>
                <div class="admin-card-body">
                    <form action="<?php echo e(route('admin.clinic-services.update', $clinicService)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="row g-4">
                            <div class="col-md-8">
                                <label class="form-label">Service Name *</label>
                                <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $clinicService->name)); ?>" required>
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger small"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Display Order</label>
                                <input type="number" name="order" class="form-control" min="0" value="<?php echo e(old('order', $clinicService->order)); ?>">
                                <?php $__errorArgs = ['order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger small"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" <?php echo e(old('is_active', $clinicService->is_active) ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="is_active">
                                        Active (available for internal appointment booking)
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input type="checkbox" name="has_multiple_doctors" id="hasMultipleDoctors" class="form-check-input" <?php echo e(old('has_multiple_doctors', $clinicService->has_multiple_doctors) ? 'checked' : ''); ?>>
                                    <label class="form-check-label" for="hasMultipleDoctors">
                                        Has multiple doctors
                                    </label>
                                    <small class="text-muted d-block">When ticked, staff booking this service will be asked to pick a doctor. Leave unticked for single-doctor services.</small>
                                </div>
                            </div>

                            <div class="col-12" id="doctorPickerSection" style="display: none;">
                                <hr>
                                <label class="form-label fw-bold">Doctors for this service</label>
                                <p class="text-muted small">Tick the doctors who work in this service. Ticking a doctor who currently belongs to another service moves them here. Unticking does <strong>not</strong> remove a doctor — edit that doctor directly to move them elsewhere.</p>
                                <div class="row">
                                    <?php $__currentLoopData = $allDoctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $isOnThisService = $doctor->clinic_service_id === $clinicService->id; ?>
                                    <div class="col-md-4 mb-2">
                                        <div class="form-check">
                                            <input type="checkbox" name="doctor_ids[]" value="<?php echo e($doctor->id); ?>" class="form-check-input" id="doctorPick<?php echo e($doctor->id); ?>"
                                                <?php echo e(in_array($doctor->id, old('doctor_ids', $isOnThisService ? [$doctor->id] : [])) ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="doctorPick<?php echo e($doctor->id); ?>">
                                                Dr. <?php echo e($doctor->name); ?>

                                                <?php if (! ($isOnThisService)): ?>
                                                <small class="text-muted">(currently: <?php echo e($doctor->clinicService->name ?? '—'); ?>)</small>
                                                <?php endif; ?>
                                            </label>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <?php $__errorArgs = ['doctor_ids'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger small d-block"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-save me-2"></i>Update Clinic Service
                                </button>
                                <a href="<?php echo e(route('admin.clinic-services.index')); ?>" class="btn btn-secondary btn-lg">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const hasMultipleDoctors = document.getElementById('hasMultipleDoctors');
        const doctorPickerSection = document.getElementById('doctorPickerSection');

        function toggleDoctorPicker() {
            doctorPickerSection.style.display = hasMultipleDoctors.checked ? 'block' : 'none';
        }

        hasMultipleDoctors.addEventListener('change', toggleDoctorPicker);
        toggleDoctorPicker();
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\metrohealth-web\resources\views/admin/clinic-services/edit.blade.php ENDPATH**/ ?>