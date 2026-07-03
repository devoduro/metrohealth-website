<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment | Metro Health Admin</title>

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
        @section('page-title', 'Book Appointment')
        @include('admin.partials.topbar')

        <div class="container-fluid p-4">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-calendar-plus me-2"></i>Book Internal Appointment</h5>
                    <a href="{{ route('admin.appointments.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Appointments
                    </a>
                </div>
                <div class="admin-card-body">
                    <form action="{{ route('admin.appointments.store') }}" method="POST" id="appointmentForm">
                        @csrf
                        <div class="row g-4">
                           

                            <div class="col-md-6 position-relative">
                                <label class="form-label">Full Name *</label>
                                <input type="text" name="full_name" id="fullNameInput" class="form-control" value="{{ old('full_name') }}" autocomplete="off" required>
                                <div id="nameSuggestions" class="list-group position-absolute w-100" style="z-index: 10; display: none;"></div>
                                <small class="text-muted" id="nameSearchHint">Start typing to find an existing patient, or just enter a new name</small>
                                @error('full_name')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                             <div class="col-md-6 position-relative">
                                <label class="form-label">Phone Number *</label>
                                <input type="text" name="phone" id="phoneInput" class="form-control" value="{{ old('phone') }}" placeholder="0241234567" autocomplete="off" required>
                                <div id="phoneSuggestions" class="list-group position-absolute w-100" style="z-index: 10; display: none;"></div>
                                <small class="text-muted" id="phoneSearchHint">Start typing to find an existing patient</small>
                                @error('phone')<span class="text-danger small d-block">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6 position-relative">
                                <label class="form-label">Address</label>
                                <input type="text" name="address" id="addressInput" class="form-control" value="{{ old('address') }}" placeholder="e.g. 12 Ridge Road, Kumasi" autocomplete="off">
                                <div id="addressSuggestions" class="list-group position-absolute w-100" style="z-index: 10; display: none;"></div>
                                <small class="text-muted">You can also search by address here</small>
                                @error('address')<span class="text-danger small d-block">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-12">
                                <hr>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <label class="form-label fw-bold mb-0">Services *</label>
                                    <button type="button" id="sameDateTimeBtn" class="btn btn-sm btn-outline-success" style="display: none;">
                                        <i class="fas fa-copy me-1"></i>Use first date/time for all
                                    </button>
                                </div>
                                <p class="text-muted small">Select one or more services. Each service gets its own date and time &mdash; use the button above if they all share the same slot.</p>
                                <div id="servicesList"></div>
                                @error('services')<span class="text-danger small d-block">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label">Notes</label>
                                <textarea name="notes" class="form-control" rows="3">{{ old('notes') }}</textarea>
                            </div>

                            <div class="col-12">
                                <div class="alert alert-info mb-0">
                                    <i class="fas fa-info-circle me-2"></i>
                                    One SMS confirmation listing all booked services and their times will be sent to the patient automatically.
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-save me-2"></i>Book Appointment
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
        $clinicServicesJson = $clinicServices->map(fn($s) => ['id' => $s->id, 'name' => $s->name]);
        $doctorsJson = $doctors->map(fn($d) => [
            'id' => $d->id,
            'name' => $d->name,
            'clinic_service_id' => $d->clinic_service_id,
            'days' => $d->days ?? [],
        ]);
    @endphp

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const clinicServices = @json($clinicServicesJson);
        const doctors = @json($doctorsJson);
        const todayStr = '{{ date('Y-m-d') }}';
        const servicesList = document.getElementById('servicesList');
        const sameDateTimeBtn = document.getElementById('sameDateTimeBtn');

        function doctorOptionsFor(serviceId) {
            const matches = doctors.filter(d => d.clinic_service_id === serviceId);
            if (!matches.length) {
                return '<option value="">No doctors registered for this service</option>';
            }
            return '<option value="">No specific doctor</option>' + matches.map(d =>
                `<option value="${d.id}" data-days='${JSON.stringify(d.days)}'>Dr. ${d.name}${d.days.length ? ' (' + d.days.join(', ') + ')' : ''}</option>`
            ).join('');
        }

        function renderServiceRows() {
            servicesList.innerHTML = clinicServices.map(function(service, index) {
                return `
                <div class="service-row border rounded p-3 mb-2" data-service-id="${service.id}">
                    <div class="row g-3 align-items-end">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input service-toggle" id="svc${service.id}" data-index="${index}">
                                <label class="form-check-label fw-bold" for="svc${service.id}">${service.name}</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small mb-1">Date</label>
                            <input type="date" class="form-control form-control-sm service-date" min="${todayStr}" disabled>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label small mb-1">Time</label>
                            <input type="time" class="form-control form-control-sm service-time" disabled>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small mb-1">Doctor</label>
                            <select class="form-select form-select-sm service-doctor" disabled>
                                ${doctorOptionsFor(service.id)}
                            </select>
                        </div>
                        <div class="col-12 service-doctor-warning text-warning small" style="display: none;">
                            <i class="fas fa-exclamation-triangle me-1"></i><span></span>
                        </div>
                    </div>
                </div>`;
            }).join('');

            servicesList.querySelectorAll('.service-toggle').forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    const row = this.closest('.service-row');
                    const dateInput = row.querySelector('.service-date');
                    const timeInput = row.querySelector('.service-time');
                    const doctorSelect = row.querySelector('.service-doctor');
                    dateInput.disabled = !this.checked;
                    timeInput.disabled = !this.checked;
                    doctorSelect.disabled = !this.checked;
                    dateInput.required = this.checked;
                    timeInput.required = this.checked;
                    updateSameDateTimeButton();
                });
            });

            servicesList.querySelectorAll('.service-row').forEach(function(row) {
                const dateInput = row.querySelector('.service-date');
                const doctorSelect = row.querySelector('.service-doctor');

                function checkDoctorDayMismatch() {
                    const warningEl = row.querySelector('.service-doctor-warning');
                    const warningText = warningEl.querySelector('span');
                    const selectedOption = doctorSelect.options[doctorSelect.selectedIndex];
                    const days = selectedOption && selectedOption.dataset.days ? JSON.parse(selectedOption.dataset.days) : null;

                    if (!dateInput.value || !doctorSelect.value || !days || !days.length) {
                        warningEl.style.display = 'none';
                        return;
                    }

                    const weekday = new Date(dateInput.value + 'T00:00:00').toLocaleDateString('en-US', { weekday: 'long' });
                    if (!days.includes(weekday)) {
                        warningText.textContent = `This doctor doesn't usually work on ${weekday}s (works: ${days.join(', ')}). You can still book — just confirm availability.`;
                        warningEl.style.display = 'block';
                    } else {
                        warningEl.style.display = 'none';
                    }
                }

                dateInput.addEventListener('change', checkDoctorDayMismatch);
                doctorSelect.addEventListener('change', checkDoctorDayMismatch);
            });
        }

        function updateSameDateTimeButton() {
            const checkedRows = servicesList.querySelectorAll('.service-toggle:checked');
            sameDateTimeBtn.style.display = checkedRows.length > 1 ? 'inline-block' : 'none';
        }

        sameDateTimeBtn.addEventListener('click', function() {
            const checkedRows = Array.from(servicesList.querySelectorAll('.service-toggle:checked')).map(cb => cb.closest('.service-row'));
            if (checkedRows.length < 2) return;

            const firstDate = checkedRows[0].querySelector('.service-date').value;
            const firstTime = checkedRows[0].querySelector('.service-time').value;

            if (!firstDate || !firstTime) {
                alert('Set the date and time on the first checked service, then click this button to copy it to the rest.');
                return;
            }

            checkedRows.forEach(function(row) {
                row.querySelector('.service-date').value = firstDate;
                row.querySelector('.service-time').value = firstTime;
            });
        });

        document.getElementById('appointmentForm').addEventListener('submit', function(e) {
            const checkedRows = Array.from(servicesList.querySelectorAll('.service-toggle:checked')).map(cb => cb.closest('.service-row'));

            if (checkedRows.length === 0) {
                e.preventDefault();
                alert('Select at least one service.');
                return;
            }

            checkedRows.forEach(function(row, i) {
                const values = {
                    clinic_service_id: row.dataset.serviceId,
                    doctor_id: row.querySelector('.service-doctor').value,
                    appointment_date: row.querySelector('.service-date').value,
                    appointment_time: row.querySelector('.service-time').value,
                };

                Object.keys(values).forEach(function(field) {
                    if (field === 'doctor_id' && !values[field]) return;
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = `services[${i}][${field}]`;
                    input.value = values[field];
                    row.closest('form').appendChild(input);
                });
            });
        });

        renderServiceRows();

        // Patient autocomplete — shared by the phone, name, and address fields, on-keystroke.
        const phoneInput = document.getElementById('phoneInput');
        const fullNameInput = document.getElementById('fullNameInput');
        const addressInput = document.getElementById('addressInput');
        const phoneSuggestions = document.getElementById('phoneSuggestions');
        const nameSuggestions = document.getElementById('nameSuggestions');
        const addressSuggestions = document.getElementById('addressSuggestions');
        const nameSearchHint = document.getElementById('nameSearchHint');

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
                    if (suggestionsEl === nameSuggestions) {
                        nameSearchHint.textContent = 'Start typing to find an existing patient, or just enter a new name';
                    }
                    return;
                }

                debounceTimer = setTimeout(() => {
                    fetch('{{ route("admin.appointments.patient-search") }}?q=' + encodeURIComponent(value))
                        .then(response => response.json())
                        .then(patients => {
                            if (!patients.length) {
                                suggestionsEl.style.display = 'none';
                                if (suggestionsEl === nameSuggestions) {
                                    nameSearchHint.textContent = 'No existing patient found — this will be added as a new patient.';
                                }
                                return;
                            }

                            suggestionsEl.innerHTML = patients.map(p =>
                                `<button type="button" class="list-group-item list-group-item-action patient-suggestion" data-phone="${p.phone}" data-name="${p.full_name}" data-address="${p.address ? p.address.replace(/"/g, '&quot;') : ''}">
                                    <strong>${p.full_name}</strong> &mdash; ${p.phone}${p.address ? ' &mdash; <small class="text-muted">' + p.address + '</small>' : ''}
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

        wirePatientSearch(phoneInput, phoneSuggestions);
        wirePatientSearch(fullNameInput, nameSuggestions);
        wirePatientSearch(addressInput, addressSuggestions);

        document.addEventListener('click', function(e) {
            if (!phoneSuggestions.contains(e.target) && e.target !== phoneInput) {
                phoneSuggestions.style.display = 'none';
            }
            if (!nameSuggestions.contains(e.target) && e.target !== fullNameInput) {
                nameSuggestions.style.display = 'none';
            }
            if (!addressSuggestions.contains(e.target) && e.target !== addressInput) {
                addressSuggestions.style.display = 'none';
            }
        });
    </script>
</body>
</html>
