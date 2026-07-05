<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Appointment | Metro Health Admin</title>

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
        <?php $__env->startSection('page-title', 'Edit Appointment'); ?>
        <?php echo $__env->make('admin.partials.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="container-fluid p-4">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-edit me-2"></i>Edit Appointment #<?php echo e($appointment->id); ?></h5>
                    <a href="<?php echo e(auth()->user()->isDoctor() ? route('admin.staff-dashboard') : route('admin.appointments.index')); ?>" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i><?php echo e(auth()->user()->isDoctor() ? 'Back to My Dashboard' : 'Back to Appointments'); ?>

                    </a>
                </div>
                <div class="admin-card-body">
                    <div class="alert alert-light border mb-4">
                        <strong>Patient:</strong> <?php echo e($appointment->patient->full_name); ?> &mdash;
                        <i class="fas fa-phone me-1"></i><?php echo e($appointment->patient->phone); ?>

                        <?php if($appointment->patient->address): ?>
                        &mdash; <i class="fas fa-map-marker-alt me-1"></i><?php echo e($appointment->patient->address); ?>

                        <?php endif; ?>
                    </div>

                    <form action="<?php echo e(route('admin.appointments.update', $appointment)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label">Service *</label>
                                <?php if(auth()->user()->isDoctor()): ?>
                                <input type="text" class="form-control" value="<?php echo e($appointment->clinicService->name ?? '—'); ?>" disabled>
                                <small class="text-muted">Doctors can't move an appointment to a different service.</small>
                                <?php else: ?>
                                <select name="clinic_service_id" id="clinicServiceSelect" class="form-select" required>
                                    <?php $__currentLoopData = $clinicServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clinicService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($clinicService->id); ?>" <?php echo e(old('clinic_service_id', $appointment->clinic_service_id) == $clinicService->id ? 'selected' : ''); ?>><?php echo e($clinicService->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['clinic_service_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger small d-block"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <?php endif; ?>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Status *</label>
                                <select name="status" class="form-select" required>
                                    <option value="scheduled" <?php echo e($appointment->status == 'scheduled' ? 'selected' : ''); ?>>Scheduled</option>
                                    <option value="completed" <?php echo e($appointment->status == 'completed' ? 'selected' : ''); ?>>Completed</option>
                                    <option value="cancelled" <?php echo e($appointment->status == 'cancelled' ? 'selected' : ''); ?>>Cancelled</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Appointment Date *</label>
                                <input type="date" name="appointment_date" id="appointmentDateInput" class="form-control" value="<?php echo e(old('appointment_date', $appointment->appointment_date->format('Y-m-d'))); ?>" required>
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
                                <label class="form-label">Appointment Time *</label>
                                <?php
                                    $currentTime = old('appointment_time', \Carbon\Carbon::parse($appointment->appointment_time)->format('H:i'));
                                    [$currentHour24, $currentMinute] = explode(':', $currentTime);
                                    $currentHour24 = (int) $currentHour24;
                                    $currentMinute = str_pad(round($currentMinute / 5) * 5 % 60, 2, '0', STR_PAD_LEFT);
                                    $currentPeriod = $currentHour24 >= 12 ? 'PM' : 'AM';
                                    $currentHour12 = $currentHour24 % 12;
                                    $currentHour12 = $currentHour12 === 0 ? 12 : $currentHour12;
                                    $currentHour12 = sprintf('%02d', $currentHour12);
                                ?>
                                <div class="d-flex gap-2 align-items-center">
                                    <select id="appointmentHourSelect" class="form-select">
                                        <?php for($h = 1; $h <= 12; $h++): ?>
                                        <option value="<?php echo e(sprintf('%02d', $h)); ?>" <?php echo e(sprintf('%02d', $h) == $currentHour12 ? 'selected' : ''); ?>><?php echo e($h); ?></option>
                                        <?php endfor; ?>
                                    </select>
                                    <span>:</span>
                                    <select id="appointmentMinuteSelect" class="form-select">
                                        <?php $__currentLoopData = [0, 5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(sprintf('%02d', $m)); ?>" <?php echo e(sprintf('%02d', $m) == $currentMinute ? 'selected' : ''); ?>><?php echo e(sprintf('%02d', $m)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <select id="appointmentPeriodSelect" class="form-select">
                                        <option value="AM" <?php echo e($currentPeriod == 'AM' ? 'selected' : ''); ?>>AM</option>
                                        <option value="PM" <?php echo e($currentPeriod == 'PM' ? 'selected' : ''); ?>>PM</option>
                                    </select>
                                </div>
                                <input type="hidden" name="appointment_time" id="appointmentTimeHidden" value="<?php echo e(sprintf('%02d', $currentHour24)); ?>:<?php echo e($currentMinute); ?>" required>
                                <?php $__errorArgs = ['appointment_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger small"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Doctor</label>
                                <div id="doctorAutoText" class="small text-muted" style="display: none;"></div>
                                <select name="doctor_id" id="doctorSelect" class="form-select"></select>
                                <?php $__errorArgs = ['doctor_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger small d-block"><?php echo e($message); ?></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <div id="doctorDayWarning" class="text-warning small mt-1" style="display: none;">
                                    <i class="fas fa-exclamation-triangle me-1"></i><span></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Notes</label>
                                <textarea name="notes" class="form-control" rows="3"><?php echo e(old('notes', $appointment->notes)); ?></textarea>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-save me-2"></i>Update Appointment
                                </button>
                                <a href="<?php echo e(auth()->user()->isDoctor() ? route('admin.staff-dashboard') : route('admin.appointments.index')); ?>" class="btn btn-secondary btn-lg">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
        $doctorsJson = $doctors->map(fn($d) => [
            'id' => $d->id,
            'name' => $d->name,
            'clinic_service_id' => $d->clinic_service_id,
            'days' => $d->days ?? [],
        ]);
        $clinicServicesJson = $clinicServices->map(fn($s) => ['id' => $s->id, 'has_multiple_doctors' => $s->has_multiple_doctors]);
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const doctors = <?php echo json_encode($doctorsJson, 15, 512) ?>;
        const clinicServices = <?php echo json_encode($clinicServicesJson, 15, 512) ?>;
        const currentDoctorId = <?php echo e(old('doctor_id', $appointment->doctor_id) ?? 'null'); ?>;
        const fixedServiceId = <?php echo e($appointment->clinic_service_id); ?>;
        const clinicServiceSelect = document.getElementById('clinicServiceSelect');
        const doctorSelect = document.getElementById('doctorSelect');
        const doctorAutoText = document.getElementById('doctorAutoText');
        const appointmentDateInput = document.getElementById('appointmentDateInput');
        const doctorDayWarning = document.getElementById('doctorDayWarning');

        function renderDoctorOptions() {
            const serviceId = clinicServiceSelect ? parseInt(clinicServiceSelect.value, 10) : fixedServiceId;
            const service = clinicServices.find(s => s.id === serviceId);
            const matches = doctors.filter(d => d.clinic_service_id === serviceId);

            if (service && service.has_multiple_doctors) {
                let options = '<option value="">No specific doctor</option>';
                options += matches.map(d =>
                    `<option value="${d.id}" data-days='${JSON.stringify(d.days)}' ${d.id === currentDoctorId ? 'selected' : ''}>Dr. ${d.name}${d.days.length ? ' (' + d.days.join(', ') + ')' : ''}</option>`
                ).join('');

                doctorSelect.innerHTML = options;
                doctorSelect.style.display = '';
                doctorAutoText.style.display = 'none';
            } else if (matches.length === 1) {
                const d = matches[0];
                doctorSelect.innerHTML = `<option value="${d.id}" data-days='${JSON.stringify(d.days)}' selected>Dr. ${d.name}</option>`;
                doctorSelect.style.display = 'none';
                doctorAutoText.textContent = `Dr. ${d.name}`;
                doctorAutoText.style.display = 'block';
            } else {
                doctorSelect.innerHTML = '';
                doctorSelect.style.display = 'none';
                doctorAutoText.textContent = 'No doctor registered for this service';
                doctorAutoText.style.display = 'block';
            }

            checkDoctorDayMismatch();
        }

        function checkDoctorDayMismatch() {
            const warningText = doctorDayWarning.querySelector('span');
            const selectedOption = doctorSelect.options[doctorSelect.selectedIndex];
            const days = selectedOption && selectedOption.dataset.days ? JSON.parse(selectedOption.dataset.days) : null;

            if (!appointmentDateInput.value || !doctorSelect.value || !days || !days.length) {
                doctorDayWarning.style.display = 'none';
                return;
            }

            const weekday = new Date(appointmentDateInput.value + 'T00:00:00').toLocaleDateString('en-US', { weekday: 'long' });
            if (!days.includes(weekday)) {
                warningText.textContent = `This doctor doesn't usually work on ${weekday}s (works: ${days.join(', ')}). You can still book — just confirm availability.`;
                doctorDayWarning.style.display = 'block';
            } else {
                doctorDayWarning.style.display = 'none';
            }
        }

        if (clinicServiceSelect) {
            clinicServiceSelect.addEventListener('change', renderDoctorOptions);
        }
        doctorSelect.addEventListener('change', checkDoctorDayMismatch);
        appointmentDateInput.addEventListener('change', checkDoctorDayMismatch);

        renderDoctorOptions();

        // Keep the hidden appointment_time field (24hr HH:MM) in sync with the 12hr hour/minute/AM-PM selects.
        const appointmentHourSelect = document.getElementById('appointmentHourSelect');
        const appointmentMinuteSelect = document.getElementById('appointmentMinuteSelect');
        const appointmentPeriodSelect = document.getElementById('appointmentPeriodSelect');
        const appointmentTimeHidden = document.getElementById('appointmentTimeHidden');

        function to24Hour(hour12, period) {
            let h = parseInt(hour12, 10) % 12;
            if (period === 'PM') h += 12;
            return String(h).padStart(2, '0');
        }

        function syncAppointmentTime() {
            appointmentTimeHidden.value = to24Hour(appointmentHourSelect.value, appointmentPeriodSelect.value) + ':' + appointmentMinuteSelect.value;
        }

        appointmentHourSelect.addEventListener('change', syncAppointmentTime);
        appointmentMinuteSelect.addEventListener('change', syncAppointmentTime);
        appointmentPeriodSelect.addEventListener('change', syncAppointmentTime);
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\metrohealth-web\resources\views/admin/appointments/edit.blade.php ENDPATH**/ ?>