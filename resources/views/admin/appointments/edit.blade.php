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
    <link rel="stylesheet" href="{{ asset('css/ashlocs-custom.css') }}">
</head>
<body style="background: #f8f9fa;">

    @include('admin.partials.sidebar')

    <div class="admin-content">
        @section('page-title', 'Edit Appointment')
        @include('admin.partials.topbar')

        <div class="container-fluid p-4">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-edit me-2"></i>Edit Appointment #{{ $appointment->id }}</h5>
                    <a href="{{ route('admin.appointments.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Appointments
                    </a>
                </div>
                <div class="admin-card-body">
                    <div class="alert alert-light border mb-4">
                        <strong>Patient:</strong> {{ $appointment->patient->full_name }} &mdash;
                        <i class="fas fa-phone me-1"></i>{{ $appointment->patient->phone }}
                        @if($appointment->patient->address)
                        &mdash; <i class="fas fa-map-marker-alt me-1"></i>{{ $appointment->patient->address }}
                        @endif
                    </div>

                    <form action="{{ route('admin.appointments.update', $appointment) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label">Service *</label>
                                <select name="clinic_service_id" id="clinicServiceSelect" class="form-select" required>
                                    @foreach($clinicServices as $clinicService)
                                    <option value="{{ $clinicService->id }}" {{ old('clinic_service_id', $appointment->clinic_service_id) == $clinicService->id ? 'selected' : '' }}>{{ $clinicService->name }}</option>
                                    @endforeach
                                </select>
                                @error('clinic_service_id')<span class="text-danger small d-block">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Status *</label>
                                <select name="status" class="form-select" required>
                                    <option value="scheduled" {{ $appointment->status == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                                    <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Appointment Date *</label>
                                <input type="date" name="appointment_date" id="appointmentDateInput" class="form-control" value="{{ old('appointment_date', $appointment->appointment_date->format('Y-m-d')) }}" required>
                                @error('appointment_date')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Appointment Time *</label>
                                <input type="time" name="appointment_time" class="form-control" value="{{ old('appointment_time', \Carbon\Carbon::parse($appointment->appointment_time)->format('H:i')) }}" required>
                                @error('appointment_time')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Doctor</label>
                                <div id="doctorAutoText" class="small text-muted" style="display: none;"></div>
                                <select name="doctor_id" id="doctorSelect" class="form-select"></select>
                                @error('doctor_id')<span class="text-danger small d-block">{{ $message }}</span>@enderror
                                <div id="doctorDayWarning" class="text-warning small mt-1" style="display: none;">
                                    <i class="fas fa-exclamation-triangle me-1"></i><span></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Notes</label>
                                <textarea name="notes" class="form-control" rows="3">{{ old('notes', $appointment->notes) }}</textarea>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-save me-2"></i>Update Appointment
                                </button>
                                <a href="{{ route('admin.appointments.index') }}" class="btn btn-secondary btn-lg">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @php
        $doctorsJson = $doctors->map(fn($d) => [
            'id' => $d->id,
            'name' => $d->name,
            'clinic_service_id' => $d->clinic_service_id,
            'days' => $d->days ?? [],
        ]);
        $clinicServicesJson = $clinicServices->map(fn($s) => ['id' => $s->id, 'has_multiple_doctors' => $s->has_multiple_doctors]);
    @endphp

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const doctors = @json($doctorsJson);
        const clinicServices = @json($clinicServicesJson);
        const currentDoctorId = {{ old('doctor_id', $appointment->doctor_id) ?? 'null' }};
        const clinicServiceSelect = document.getElementById('clinicServiceSelect');
        const doctorSelect = document.getElementById('doctorSelect');
        const doctorAutoText = document.getElementById('doctorAutoText');
        const appointmentDateInput = document.getElementById('appointmentDateInput');
        const doctorDayWarning = document.getElementById('doctorDayWarning');

        function renderDoctorOptions() {
            const serviceId = parseInt(clinicServiceSelect.value, 10);
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

        clinicServiceSelect.addEventListener('change', renderDoctorOptions);
        doctorSelect.addEventListener('change', checkDoctorDayMismatch);
        appointmentDateInput.addEventListener('change', checkDoctorDayMismatch);

        renderDoctorOptions();
    </script>
</body>
</html>
