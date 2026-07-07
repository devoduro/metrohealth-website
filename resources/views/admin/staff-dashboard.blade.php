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
    <link rel="stylesheet" href="{{ asset('css/ashlocs-custom.css') }}">
</head>
<body style="background: #f8f9fa;">

    @include('admin.partials.sidebar')

    <div class="admin-content">
        @section('page-title', 'My Dashboard')
        @include('admin.partials.topbar')

        <div class="container-fluid p-4">
            @if(session('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i>{{ session('warning') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            <div class="alert border-0 shadow-sm mb-4" style="background: linear-gradient(135deg, #84a33f 0%, #6b8a32 100%);">
                <h4 class="text-white mb-1"><i class="fas fa-user-md me-2"></i>Welcome, {{ $user->name }}</h4>
                <p class="text-white-50 mb-0">{{ $user->roleRecord->name ?? ucfirst($user->role) }} &mdash; {{ $services->pluck('name')->implode(', ') ?: 'No service assigned' }}</p>
            </div>

            @if($services->isEmpty())
            <div class="admin-card">
                <div class="admin-card-body text-center py-5 text-muted">
                    <i class="fas fa-exclamation-circle fa-3x mb-3" style="opacity: 0.3;"></i>
                    <h5>No clinic service assigned yet</h5>
                    <p>Contact an administrator to assign you to a service.</p>
                </div>
            </div>
            @else

            @if($services->count() > 1)
            <div class="admin-card mb-4">
                <div class="admin-card-body">
                    <label class="form-label fw-bold">Working in:</label>
                    <form method="GET" class="d-flex gap-2">
                        <select name="service_id" class="form-select" style="max-width: 400px;" onchange="this.form.submit()">
                            @foreach($services as $service)
                            <option value="{{ $service->id }}" {{ $selectedServiceId == $service->id ? 'selected' : '' }}>{{ $service->name }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
            @endif

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="admin-card">
                        <div class="admin-card-header">
                            <h5><i class="fas fa-user-plus me-2" style="color: #84a33f;"></i>Add Patient & Appointment</h5>
                        </div>
                        <div class="admin-card-body">
                            <form action="{{ route('admin.staff-dashboard.quick-add') }}" method="POST" id="quickAddForm">
                                @csrf
                                <input type="hidden" name="clinic_service_id" value="{{ $selectedServiceId }}">

                                <div class="row g-3">
                                    <div class="col-md-6 position-relative">
                                        <label class="form-label">Full Name *</label>
                                        <input type="text" name="full_name" id="fullNameInput" class="form-control" value="{{ old('full_name') }}" autocomplete="off" required>
                                        <div id="nameSuggestions" class="list-group position-absolute w-100" style="z-index: 10; display: none;"></div>
                                        @error('full_name')<span class="text-danger small">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="col-md-6 position-relative">
                                        <label class="form-label">Phone Number *</label>
                                        <input type="text" name="phone" id="phoneInput" class="form-control" value="{{ old('phone') }}" placeholder="0241234567" autocomplete="off" required>
                                        <div id="phoneSuggestions" class="list-group position-absolute w-100" style="z-index: 10; display: none;"></div>
                                        @error('phone')<span class="text-danger small d-block">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Address</label>
                                        <input type="text" name="address" id="addressInput" class="form-control" value="{{ old('address') }}">
                                        @error('address')<span class="text-danger small d-block">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Date *</label>
                                        <input type="date" name="appointment_date" class="form-control" min="{{ date('Y-m-d') }}" value="{{ old('appointment_date') }}" required>
                                        @error('appointment_date')<span class="text-danger small">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Time *</label>
                                        @php
                                            $oldTime = old('appointment_time');
                                            $quickAddHour24 = $oldTime ? (int) explode(':', $oldTime)[0] : 9;
                                            $quickAddMinute = $oldTime ? str_pad(round(explode(':', $oldTime)[1] / 5) * 5 % 60, 2, '0', STR_PAD_LEFT) : '00';
                                            $quickAddPeriod = $quickAddHour24 >= 12 ? 'PM' : 'AM';
                                            $quickAddHour12 = $quickAddHour24 % 12;
                                            $quickAddHour12 = $quickAddHour12 === 0 ? 12 : $quickAddHour12;
                                            $quickAddHour12 = sprintf('%02d', $quickAddHour12);
                                        @endphp
                                        <div class="d-flex gap-2 align-items-center">
                                            <select id="appointmentHourSelect" class="form-select">
                                                @for ($h = 1; $h <= 12; $h++)
                                                <option value="{{ sprintf('%02d', $h) }}" {{ sprintf('%02d', $h) == $quickAddHour12 ? 'selected' : '' }}>{{ $h }}</option>
                                                @endfor
                                            </select>
                                            <span>:</span>
                                            <select id="appointmentMinuteSelect" class="form-select">
                                                @foreach ([0, 5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55] as $m)
                                                <option value="{{ sprintf('%02d', $m) }}" {{ sprintf('%02d', $m) == $quickAddMinute ? 'selected' : '' }}>{{ sprintf('%02d', $m) }}</option>
                                                @endforeach
                                            </select>
                                            <select id="appointmentPeriodSelect" class="form-select">
                                                <option value="AM" {{ $quickAddPeriod == 'AM' ? 'selected' : '' }}>AM</option>
                                                <option value="PM" {{ $quickAddPeriod == 'PM' ? 'selected' : '' }}>PM</option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="appointment_time" id="appointmentTimeHidden" value="{{ sprintf('%02d', $quickAddHour24) }}:{{ $quickAddMinute }}" required>
                                        @error('appointment_time')<span class="text-danger small">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Notes</label>
                                        <textarea name="notes" class="form-control" rows="2">{{ old('notes') }}</textarea>
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
                            @if($upcomingAppointments->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover table-sm">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Patient</th>
                                            <th>Date & Time</th>
                                            <th>Status</th>
                                            <th>Notes</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($upcomingAppointments as $appointment)
                                        <tr>
                                            <td>
                                                <strong>{{ $appointment->patient->full_name ?? '—' }}</strong><br>
                                                <small class="text-muted">{{ $appointment->patient->phone ?? '—' }}</small>
                                            </td>
                                            <td>
                                                {{ $appointment->appointment_date->format('M d, Y') }}<br>
                                                <small class="text-muted">{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('g:i A') }}</small>
                                            </td>
                                            <td>
                                                <span class="badge bg-{{ $appointment->status == 'scheduled' ? 'warning' : ($appointment->status == 'completed' ? 'info' : 'secondary') }}">
                                                    {{ ucfirst($appointment->status) }}
                                                </span>
                                            </td>
                                            <td>
                                                <small>{{ $appointment->notes ?: '—' }}</small>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.appointments.edit', $appointment) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                            <div class="text-center py-4 text-muted">
                                <i class="fas fa-calendar-times fa-3x mb-3" style="opacity: 0.3;"></i>
                                <p class="mb-0">No upcoming appointments for this service.</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif
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
                    fetch('{{ route("admin.appointments.patient-search") }}?q=' + encodeURIComponent(value))
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

        // Keep the hidden appointment_time field (24hr HH:MM) in sync with the 12hr hour/minute/AM-PM selects.
        const appointmentHourSelect = document.getElementById('appointmentHourSelect');
        const appointmentMinuteSelect = document.getElementById('appointmentMinuteSelect');
        const appointmentPeriodSelect = document.getElementById('appointmentPeriodSelect');
        const appointmentTimeHidden = document.getElementById('appointmentTimeHidden');

        if (appointmentHourSelect) {
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
        }
    </script>
</body>
</html>
