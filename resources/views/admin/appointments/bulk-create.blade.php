<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulk Add Patients | Metro Health Admin</title>

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
        @section('page-title', 'Bulk Add Patients')
        @include('admin.partials.topbar')

        <div class="container-fluid p-4">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-user-plus me-2"></i>Bulk Add Patients to a Service</h5>
                    <a href="{{ route('admin.appointments.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Appointments
                    </a>
                </div>
                <div class="admin-card-body">
                    <p class="text-muted">Pick one clinic service, then search or enter a patient and click <strong>Add to List</strong>. Keep adding as many patients as you need for that service, then book them all at once &mdash; each gets their own appointment slot and SMS confirmation.</p>

                    <div id="bulkFormAlert" style="display: none;"></div>

                    <form action="{{ route('admin.appointments.bulk-store') }}" method="POST" id="bulkForm">
                        @csrf

                        <div class="row g-4 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Clinic Service *</label>
                                <select name="clinic_service_id" id="clinicServiceSelect" class="form-select" required>
                                    <option value="">Choose a service...</option>
                                    @foreach($clinicServices as $clinicService)
                                    <option value="{{ $clinicService->id }}" {{ old('clinic_service_id') == $clinicService->id ? 'selected' : '' }}>{{ $clinicService->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger small d-block" id="clinicServiceError"></span>
                                <small class="text-muted" id="serviceLockedHint" style="display: none;">Remove all queued patients below to switch services.</small>
                            </div>
                        </div>

                        <hr>

                        <div id="addPatientPanel" style="display: none;">
                            <h6 class="fw-bold mb-3">Add a Patient</h6>
                            <div class="row g-3">
                                <div class="col-md-4 position-relative">
                                    <label class="form-label small mb-1">Full Name *</label>
                                    <input type="text" id="patientName" class="form-control" autocomplete="off">
                                    <div class="list-group position-absolute w-100 name-suggestions" style="z-index: 10; display: none;"></div>
                                </div>
                                <div class="col-md-3 position-relative">
                                    <label class="form-label small mb-1">Phone *</label>
                                    <input type="text" id="patientPhone" class="form-control" placeholder="0241234567" autocomplete="off">
                                    <div class="list-group position-absolute w-100 phone-suggestions" style="z-index: 10; display: none;"></div>
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label small mb-1">Address</label>
                                    <input type="text" id="patientAddress" class="form-control" autocomplete="off">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small mb-1">Date *</label>
                                    <input type="date" id="patientDate" class="form-control" min="{{ date('Y-m-d') }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small mb-1">Time *</label>
                                    <div class="d-flex gap-1">
                                        <select id="patientTimeHour" class="form-select"></select>
                                        <select id="patientTimeMinute" class="form-select"></select>
                                        <select id="patientTimePeriod" class="form-select"></select>
                                    </div>
                                </div>
                                <div class="col-md-3" id="patientDoctorContainer"></div>
                                <div class="col-md-3">
                                    <label class="form-label small mb-1">Notes</label>
                                    <input type="text" id="patientNotes" class="form-control">
                                </div>
                                <div class="col-12 text-warning small" id="patientDoctorWarning" style="display: none;">
                                    <i class="fas fa-exclamation-triangle me-1"></i><span></span>
                                </div>
                            </div>

                            <span class="text-danger small d-block mt-2" id="addPatientError"></span>

                            <button type="button" id="addToListBtn" class="btn btn-success mt-3">
                                <i class="fas fa-plus me-1"></i>Add to List
                            </button>
                        </div>
                        <div id="choosServiceHint" class="text-muted">Choose a clinic service above to start adding patients.</div>

                        <hr>

                        <label class="form-label fw-bold">Patients to Book (<span id="queueCount">0</span>)</label>
                        <p class="text-muted small" id="patientsQueueEmpty">No patients added yet.</p>
                        <div class="table-responsive">
                            <table class="table table-sm table-hover align-middle" id="patientsQueueTable" style="display: none;">
                                <thead class="table-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Date &amp; Time</th>
                                        <th>Doctor</th>
                                        <th>Notes</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="patientsQueueBody"></tbody>
                            </table>
                        </div>
                        <span class="text-danger small d-block" id="patientsError"></span>

                        <div class="col-12 mt-4">
                            <div class="alert alert-info mb-0">
                                <i class="fas fa-info-circle me-2"></i>
                                Each patient will receive their own individual SMS confirmation.
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary btn-lg" id="bulkSubmitBtn" disabled>
                                <i class="fas fa-save me-2"></i>Book All Appointments
                            </button>
                            <a href="{{ route('admin.appointments.index') }}" class="btn btn-secondary btn-lg">Back to Appointments List</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @php
        $clinicServicesJson = $clinicServices->map(fn($s) => ['id' => $s->id, 'name' => $s->name, 'has_multiple_doctors' => $s->has_multiple_doctors]);
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
        const searchUrl = '{{ route("admin.appointments.patient-search") }}';

        const clinicServiceSelect = document.getElementById('clinicServiceSelect');
        const serviceLockedHint = document.getElementById('serviceLockedHint');
        const addPatientPanel = document.getElementById('addPatientPanel');
        const choosServiceHint = document.getElementById('choosServiceHint');
        const patientDoctorContainer = document.getElementById('patientDoctorContainer');
        const patientDoctorWarning = document.getElementById('patientDoctorWarning');
        const addPatientError = document.getElementById('addPatientError');
        const addToListBtn = document.getElementById('addToListBtn');

        const patientNameInput = document.getElementById('patientName');
        const patientPhoneInput = document.getElementById('patientPhone');
        const patientAddressInput = document.getElementById('patientAddress');
        const patientDateInput = document.getElementById('patientDate');
        const patientTimeHour = document.getElementById('patientTimeHour');
        const patientTimeMinute = document.getElementById('patientTimeMinute');
        const patientTimePeriod = document.getElementById('patientTimePeriod');
        const nameSuggestions = document.querySelector('.name-suggestions');
        const phoneSuggestions = document.querySelector('.phone-suggestions');

        const queueCount = document.getElementById('queueCount');
        const patientsQueueEmpty = document.getElementById('patientsQueueEmpty');
        const patientsQueueTable = document.getElementById('patientsQueueTable');
        const patientsQueueBody = document.getElementById('patientsQueueBody');
        const patientsError = document.getElementById('patientsError');
        const bulkSubmitBtn = document.getElementById('bulkSubmitBtn');

        let patientsQueue = [];

        // --- Time picker helpers (12hr hour + 5-min steps + AM/PM) ---
        function hourOptionsHtml() {
            let html = '';
            for (let h = 1; h <= 12; h++) {
                const hh = String(h).padStart(2, '0');
                html += `<option value="${hh}">${h}</option>`;
            }
            return html;
        }

        function minuteOptionsHtml() {
            return [0, 5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55].map(function(m) {
                const mm = String(m).padStart(2, '0');
                return `<option value="${mm}">${mm}</option>`;
            }).join('');
        }

        function periodOptionsHtml() {
            return '<option value="AM">AM</option><option value="PM">PM</option>';
        }

        function to24Hour(hour12, period) {
            let h = parseInt(hour12, 10) % 12;
            if (period === 'PM') h += 12;
            return String(h).padStart(2, '0');
        }

        function currentTime24() {
            return to24Hour(patientTimeHour.value, patientTimePeriod.value) + ':' + patientTimeMinute.value;
        }

        function formatTime12(time24) {
            const [h, m] = time24.split(':');
            const h24 = parseInt(h, 10);
            const period = h24 >= 12 ? 'PM' : 'AM';
            let h12 = h24 % 12;
            h12 = h12 === 0 ? 12 : h12;
            return `${h12}:${m} ${period}`;
        }

        patientTimeHour.innerHTML = hourOptionsHtml();
        patientTimeMinute.innerHTML = minuteOptionsHtml();
        patientTimePeriod.innerHTML = periodOptionsHtml();

        // --- Doctor field for the currently selected service ---
        function currentService() {
            const id = parseInt(clinicServiceSelect.value, 10);
            return clinicServices.find(s => s.id === id) || null;
        }

        function doctorFieldHtml() {
            const service = currentService();
            if (!service) {
                return `<select class="form-select patient-doctor" id="patientDoctor" style="display:none" disabled></select>`;
            }

            const matches = doctors.filter(d => d.clinic_service_id === service.id);

            if (service.has_multiple_doctors) {
                const options = matches.length
                    ? '<option value="">No specific doctor</option>' + matches.map(d =>
                        `<option value="${d.id}" data-days='${JSON.stringify(d.days)}'>Dr. ${d.name}${d.days.length ? ' (' + d.days.join(', ') + ')' : ''}</option>`
                      ).join('')
                    : '<option value="">No doctors registered for this service</option>';
                return `
                    <label class="form-label small mb-1">Doctor</label>
                    <select class="form-select patient-doctor" id="patientDoctor">${options}</select>`;
            }

            if (matches.length === 1) {
                const d = matches[0];
                return `
                    <label class="form-label small mb-1 d-block">Doctor</label>
                    <div class="small text-muted">Dr. ${d.name}</div>
                    <select class="form-select patient-doctor" id="patientDoctor" style="display:none">
                        <option value="${d.id}" data-days='${JSON.stringify(d.days)}' selected>Dr. ${d.name}</option>
                    </select>`;
            }

            return `<select class="form-select patient-doctor" id="patientDoctor" style="display:none" disabled></select>`;
        }

        function renderDoctorField() {
            patientDoctorContainer.innerHTML = doctorFieldHtml();
            const doctorSelect = document.getElementById('patientDoctor');
            doctorSelect.addEventListener('change', checkDoctorDayMismatch);
            checkDoctorDayMismatch();
        }

        function checkDoctorDayMismatch() {
            const doctorSelect = document.getElementById('patientDoctor');
            const warningText = patientDoctorWarning.querySelector('span');
            const selectedOption = doctorSelect.options[doctorSelect.selectedIndex];
            const days = selectedOption && selectedOption.dataset.days ? JSON.parse(selectedOption.dataset.days) : null;

            if (!patientDateInput.value || !doctorSelect.value || !days || !days.length) {
                patientDoctorWarning.style.display = 'none';
                return;
            }

            const weekday = new Date(patientDateInput.value + 'T00:00:00').toLocaleDateString('en-US', { weekday: 'long' });
            if (!days.includes(weekday)) {
                warningText.textContent = `This doctor doesn't usually work on ${weekday}s (works: ${days.join(', ')}). You can still book — just confirm availability.`;
                patientDoctorWarning.style.display = 'block';
            } else {
                patientDoctorWarning.style.display = 'none';
            }
        }

        patientDateInput.addEventListener('change', checkDoctorDayMismatch);

        // --- Patient search-as-you-type (shared by name & phone fields) ---
        function selectPatient(patient) {
            patientNameInput.value = patient.full_name;
            patientPhoneInput.value = patient.phone;
            patientAddressInput.value = patient.address || '';
            nameSuggestions.style.display = 'none';
            phoneSuggestions.style.display = 'none';
        }

        function wireSearch(inputEl, suggestionsEl) {
            let debounceTimer;
            inputEl.addEventListener('input', function() {
                clearTimeout(debounceTimer);
                const value = this.value.trim();
                if (value.length < 3) {
                    suggestionsEl.style.display = 'none';
                    return;
                }
                debounceTimer = setTimeout(() => {
                    fetch(searchUrl + '?q=' + encodeURIComponent(value))
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
                                    selectPatient({ phone: this.dataset.phone, full_name: this.dataset.name, address: this.dataset.address });
                                });
                            });
                        })
                        .catch(() => { suggestionsEl.style.display = 'none'; });
                }, 300);
            });
        }

        wireSearch(patientNameInput, nameSuggestions);
        wireSearch(patientPhoneInput, phoneSuggestions);

        document.addEventListener('click', function(e) {
            if (!nameSuggestions.contains(e.target) && e.target !== patientNameInput) nameSuggestions.style.display = 'none';
            if (!phoneSuggestions.contains(e.target) && e.target !== patientPhoneInput) phoneSuggestions.style.display = 'none';
        });

        // --- Queue rendering ---
        function renderQueue() {
            queueCount.textContent = patientsQueue.length;
            patientsQueueEmpty.style.display = patientsQueue.length ? 'none' : 'block';
            patientsQueueTable.style.display = patientsQueue.length ? '' : 'none';
            bulkSubmitBtn.disabled = patientsQueue.length === 0;

            // Lock the service while patients are queued so every entry stays for the same service.
            clinicServiceSelect.disabled = patientsQueue.length > 0;
            serviceLockedHint.style.display = patientsQueue.length > 0 ? 'block' : 'none';

            patientsQueueBody.innerHTML = patientsQueue.map(function(p, i) {
                return `
                    <tr>
                        <td>${p.full_name}</td>
                        <td>${p.phone}</td>
                        <td>${p.appointment_date}<br><small class="text-muted">${formatTime12(p.appointment_time)}</small></td>
                        <td>${p.doctor_name || '&mdash;'}</td>
                        <td>${p.notes || '&mdash;'}</td>
                        <td class="text-end">
                            <button type="button" class="btn btn-sm btn-outline-danger remove-queued-patient" data-index="${i}">
                                <i class="fas fa-times"></i>
                            </button>
                        </td>
                    </tr>`;
            }).join('');
        }

        patientsQueueBody.addEventListener('click', function(e) {
            const btn = e.target.closest('.remove-queued-patient');
            if (!btn) return;
            patientsQueue.splice(parseInt(btn.dataset.index, 10), 1);
            renderQueue();
        });

        // --- Add to list ---
        addToListBtn.addEventListener('click', function() {
            addPatientError.textContent = '';

            const fullName = patientNameInput.value.trim();
            const phone = patientPhoneInput.value.trim();
            const date = patientDateInput.value;

            if (!fullName || !phone || !date) {
                addPatientError.textContent = 'Full name, phone, and date are required.';
                return;
            }

            const doctorSelect = document.getElementById('patientDoctor');
            const doctorOption = doctorSelect.options[doctorSelect.selectedIndex];

            patientsQueue.push({
                full_name: fullName,
                phone: phone,
                address: patientAddressInput.value.trim(),
                doctor_id: doctorSelect.value || '',
                doctor_name: doctorSelect.value ? doctorOption.textContent.trim() : '',
                appointment_date: date,
                appointment_time: currentTime24(),
                notes: document.getElementById('patientNotes').value.trim(),
            });

            renderQueue();

            // Clear the patient-specific fields but keep date/time/doctor for the next entry —
            // most bulk sessions are for several patients seeing the same doctor around the same time.
            patientNameInput.value = '';
            patientPhoneInput.value = '';
            patientAddressInput.value = '';
            document.getElementById('patientNotes').value = '';
            patientNameInput.focus();
        });

        // --- Service selection ---
        clinicServiceSelect.addEventListener('change', function() {
            if (this.value) {
                addPatientPanel.style.display = 'block';
                choosServiceHint.style.display = 'none';
                renderDoctorField();
                if (!patientDateInput.value) {
                    patientDateInput.value = '{{ date('Y-m-d') }}';
                }
            } else {
                addPatientPanel.style.display = 'none';
                choosServiceHint.style.display = 'block';
            }
        });

        // --- Submission ---
        const bulkForm = document.getElementById('bulkForm');
        const bulkFormAlert = document.getElementById('bulkFormAlert');
        const clinicServiceError = document.getElementById('clinicServiceError');

        function showAlert(type, message) {
            bulkFormAlert.className = `alert alert-${type} alert-dismissible fade show`;
            bulkFormAlert.innerHTML = `${message}<button type="button" class="btn-close" data-bs-dismiss="alert"></button>`;
            bulkFormAlert.style.display = 'block';
            bulkFormAlert.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        function clearFieldErrors() {
            clinicServiceError.textContent = '';
            patientsError.textContent = '';
        }

        bulkForm.addEventListener('submit', function(e) {
            e.preventDefault();
            clearFieldErrors();

            if (!clinicServiceSelect.value) {
                clinicServiceError.textContent = 'Choose a clinic service.';
                return;
            }

            if (patientsQueue.length === 0) {
                patientsError.textContent = 'Add at least one patient to the list.';
                return;
            }

            const formData = new FormData();
            formData.append('_token', bulkForm.querySelector('input[name="_token"]').value);
            formData.append('clinic_service_id', clinicServiceSelect.value);

            patientsQueue.forEach(function(p, i) {
                Object.keys(p).forEach(function(field) {
                    if (field === 'doctor_name' || !p[field]) return;
                    formData.append(`patients[${i}][${field}]`, p[field]);
                });
            });

            bulkSubmitBtn.disabled = true;
            bulkSubmitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Booking...';

            fetch(bulkForm.action, {
                method: 'POST',
                headers: { 'Accept': 'application/json' },
                body: formData,
            })
                .then(async function(response) {
                    const data = await response.json().catch(() => null);

                    if (response.ok && data && data.success) {
                        showAlert('success', data.message);
                        patientsQueue = [];
                        renderQueue();
                    } else if (response.status === 422 && data && data.errors) {
                        const messages = Object.values(data.errors).flat().join(' ');
                        showAlert('danger', messages || 'Please check the form for errors.');
                        bulkSubmitBtn.disabled = patientsQueue.length === 0;
                    } else {
                        showAlert('danger', (data && data.message) || 'Something went wrong. Please try again.');
                        bulkSubmitBtn.disabled = patientsQueue.length === 0;
                    }
                })
                .catch(function() {
                    showAlert('danger', 'Network error. Please check your connection and try again.');
                    bulkSubmitBtn.disabled = patientsQueue.length === 0;
                })
                .finally(function() {
                    bulkSubmitBtn.innerHTML = '<i class="fas fa-save me-2"></i>Book All Appointments';
                });
        });

        renderQueue();
    </script>
</body>
</html>
