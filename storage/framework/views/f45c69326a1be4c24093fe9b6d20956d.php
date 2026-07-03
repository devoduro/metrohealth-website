<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Dashboard | Metro Health Admin</title>

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
        <?php $__env->startSection('page-title', 'My Dashboard'); ?>
        <?php echo $__env->make('admin.partials.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="container-fluid p-4">
            <?php if(session('warning')): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i><?php echo e(session('warning')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>

            <div class="alert border-0 shadow-sm mb-4" style="background: linear-gradient(135deg, #84a33f 0%, #6b8a32 100%);">
                <h4 class="text-white mb-1"><i class="fas fa-user-md me-2"></i>Welcome, <?php echo e($user->name); ?></h4>
                <p class="text-white-50 mb-0"><?php echo e(ucfirst($user->role)); ?> &mdash; <?php echo e($services->pluck('name')->implode(', ') ?: 'No service assigned'); ?></p>
            </div>

            <?php if($services->isEmpty()): ?>
            <div class="admin-card">
                <div class="admin-card-body text-center py-5 text-muted">
                    <i class="fas fa-exclamation-circle fa-3x mb-3" style="opacity: 0.3;"></i>
                    <h5>No clinic service assigned yet</h5>
                    <p>Contact an administrator to assign you to a service.</p>
                </div>
            </div>
            <?php else: ?>

            <?php if($services->count() > 1): ?>
            <div class="admin-card mb-4">
                <div class="admin-card-body">
                    <label class="form-label fw-bold">Working in:</label>
                    <form method="GET" class="d-flex gap-2">
                        <select name="service_id" class="form-select" style="max-width: 400px;" onchange="this.form.submit()">
                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($service->id); ?>" <?php echo e($selectedServiceId == $service->id ? 'selected' : ''); ?>><?php echo e($service->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </form>
                </div>
            </div>
            <?php endif; ?>

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="admin-card">
                        <div class="admin-card-header">
                            <h5><i class="fas fa-user-plus me-2" style="color: #84a33f;"></i>Add Patient & Appointment</h5>
                        </div>
                        <div class="admin-card-body">
                            <form action="<?php echo e(route('admin.staff-dashboard.quick-add')); ?>" method="POST" id="quickAddForm">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="clinic_service_id" value="<?php echo e($selectedServiceId); ?>">

                                <div class="row g-3">
                                    <div class="col-md-6 position-relative">
                                        <label class="form-label">Full Name *</label>
                                        <input type="text" name="full_name" id="fullNameInput" class="form-control" value="<?php echo e(old('full_name')); ?>" autocomplete="off" required>
                                        <div id="nameSuggestions" class="list-group position-absolute w-100" style="z-index: 10; display: none;"></div>
                                        <?php $__errorArgs = ['full_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger small"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="col-md-6 position-relative">
                                        <label class="form-label">Phone Number *</label>
                                        <input type="text" name="phone" id="phoneInput" class="form-control" value="<?php echo e(old('phone')); ?>" placeholder="0241234567" autocomplete="off" required>
                                        <div id="phoneSuggestions" class="list-group position-absolute w-100" style="z-index: 10; display: none;"></div>
                                        <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger small d-block"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Address</label>
                                        <input type="text" name="address" id="addressInput" class="form-control" value="<?php echo e(old('address')); ?>">
                                        <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger small d-block"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Date *</label>
                                        <input type="date" name="appointment_date" class="form-control" min="<?php echo e(date('Y-m-d')); ?>" value="<?php echo e(old('appointment_date')); ?>" required>
                                        <?php $__errorArgs = ['appointment_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger small"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Time *</label>
                                        <input type="time" name="appointment_time" class="form-control" value="<?php echo e(old('appointment_time')); ?>" required>
                                        <?php $__errorArgs = ['appointment_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger small"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Notes</label>
                                        <textarea name="notes" class="form-control" rows="2"><?php echo e(old('notes')); ?></textarea>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save me-2"></i>Book Appointment
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="admin-card">
                        <div class="admin-card-header">
                            <h5><i class="fas fa-calendar-check me-2" style="color: #84a33f;"></i>Upcoming Appointments</h5>
                        </div>
                        <div class="admin-card-body">
                            <?php if($upcomingAppointments->count() > 0): ?>
                            <div class="table-responsive">
                                <table class="table table-hover table-sm">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Patient</th>
                                            <th>Date & Time</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $upcomingAppointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <strong><?php echo e($appointment->patient->full_name ?? '—'); ?></strong><br>
                                                <small class="text-muted"><?php echo e($appointment->patient->phone ?? '—'); ?></small>
                                            </td>
                                            <td>
                                                <?php echo e($appointment->appointment_date->format('M d, Y')); ?><br>
                                                <small class="text-muted"><?php echo e(\Carbon\Carbon::parse($appointment->appointment_time)->format('g:i A')); ?></small>
                                            </td>
                                            <td>
                                                <span class="badge bg-<?php echo e($appointment->status == 'scheduled' ? 'warning' : ($appointment->status == 'completed' ? 'info' : 'secondary')); ?>">
                                                    <?php echo e(ucfirst($appointment->status)); ?>

                                                </span>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php else: ?>
                            <div class="text-center py-4 text-muted">
                                <i class="fas fa-calendar-times fa-3x mb-3" style="opacity: 0.3;"></i>
                                <p class="mb-0">No upcoming appointments for this service.</p>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const phoneInput = document.getElementById('phoneInput');
        const fullNameInput = document.getElementById('fullNameInput');
        const addressInput = document.getElementById('addressInput');
        const phoneSuggestions = document.getElementById('phoneSuggestions');
        const nameSuggestions = document.getElementById('nameSuggestions');

        function selectPatient(patient, suggestionsEl) {
            phoneInput.value = patient.phone;
            fullNameInput.value = patient.full_name;
            addressInput.value = patient.address || '';
            suggestionsEl.style.display = 'none';
        }

        function wirePatientSearch(inputEl, suggestionsEl) {
            let debounceTimer;

            inputEl.addEventListener('input', function() {
                clearTimeout(debounceTimer);
                const value = this.value.trim();

                if (value.length < 3) {
                    suggestionsEl.style.display = 'none';
                    return;
                }

                debounceTimer = setTimeout(() => {
                    fetch('<?php echo e(route("admin.appointments.patient-search")); ?>?q=' + encodeURIComponent(value))
                        .then(response => response.json())
                        .then(patients => {
                            if (!patients.length) {
                                suggestionsEl.style.display = 'none';
                                return;
                            }

                            suggestionsEl.innerHTML = patients.map(p =>
                                `<button type="button" class="list-group-item list-group-item-action patient-suggestion" data-phone="${p.phone}" data-name="${p.full_name}" data-address="${p.address ? p.address.replace(/"/g, '&quot;') : ''}">
                                    <strong>${p.full_name}</strong> &mdash; ${p.phone}
                                </button>`
                            ).join('');
                            suggestionsEl.style.display = 'block';

                            suggestionsEl.querySelectorAll('.patient-suggestion').forEach(btn => {
                                btn.addEventListener('click', function() {
                                    selectPatient({ phone: this.dataset.phone, full_name: this.dataset.name, address: this.dataset.address }, suggestionsEl);
                                });
                            });
                        })
                        .catch(() => { suggestionsEl.style.display = 'none'; });
                }, 300);
            });
        }

        if (phoneInput) {
            wirePatientSearch(phoneInput, phoneSuggestions);
            wirePatientSearch(fullNameInput, nameSuggestions);

            document.addEventListener('click', function(e) {
                if (!phoneSuggestions.contains(e.target) && e.target !== phoneInput) {
                    phoneSuggestions.style.display = 'none';
                }
                if (!nameSuggestions.contains(e.target) && e.target !== fullNameInput) {
                    nameSuggestions.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\metrohealth-web\resources\views/admin/staff-dashboard.blade.php ENDPATH**/ ?>