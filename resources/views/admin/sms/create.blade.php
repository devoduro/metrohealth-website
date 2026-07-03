<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compose Bulk SMS | Metro Health Admin</title>

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
        @section('page-title', 'Compose Bulk SMS')
        @include('admin.partials.topbar')

        <div class="container-fluid p-4">
            <div class="mb-3">
                <a href="{{ route('admin.sms.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Bulk SMS
                </a>
            </div>

            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            <div class="row">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-bottom">
                            <h5 class="mb-0"><i class="fas fa-sms me-2" style="color: #84a33f;"></i>Compose Bulk SMS</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.sms.send') }}" method="POST" id="smsForm">
                                @csrf

                                <p class="text-muted small mb-3">Combine any of the filters below to narrow the recipient list — they all apply together.</p>

                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Service</label>
                                        <select name="clinic_service_id" id="serviceInput" class="form-select">
                                            <option value="">All services</option>
                                            @foreach($clinicServices as $clinicService)
                                            <option value="{{ $clinicService->id }}">{{ $clinicService->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Status</label>
                                        <select name="status" id="statusInput" class="form-select">
                                            <option value="">Any (excludes cancelled)</option>
                                            <option value="scheduled">Scheduled</option>
                                            <option value="completed">Completed</option>
                                            <option value="cancelled">Cancelled</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold">Date</label>
                                    <select name="filter_type" id="filterType" class="form-select">
                                        <option value="any">Any date</option>
                                        <option value="date">A specific date</option>
                                        <option value="week">A date range (week)</option>
                                        <option value="month">A month</option>
                                        <option value="days_left">N days before the appointment (requires a service above)</option>
                                    </select>
                                </div>

                                <div class="mb-4" id="dateFilter" style="display: none;">
                                    <label class="form-label fw-bold">Appointment Date</label>
                                    <input type="date" name="date" id="dateInput" class="form-control">
                                </div>

                                <div class="mb-4 row g-2" id="weekFilter" style="display: none;">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">From</label>
                                        <input type="date" name="week_start" id="weekStartInput" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">To</label>
                                        <input type="date" name="week_end" id="weekEndInput" class="form-control">
                                    </div>
                                </div>

                                <div class="mb-4" id="monthFilter" style="display: none;">
                                    <label class="form-label fw-bold">Month</label>
                                    <input type="month" name="month" id="monthInput" class="form-control">
                                </div>

                                <div class="mb-4" id="daysLeftFilter" style="display: none;">
                                    <label class="form-label fw-bold">Days Until Appointment</label>
                                    <input type="number" name="days" id="daysInput" class="form-control" min="0" placeholder="e.g. 3">
                                    <small class="text-muted" id="daysLeftHint" style="display: none;"></small>
                                </div>

                                <div id="recipientCountBox" class="mb-4" style="display: none;">
                                    <div class="alert alert-info mb-0">
                                        <i class="fas fa-users me-2"></i>
                                        <strong><span id="recipientNumber">0</span> recipients</strong> will receive this message
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold">Message <span class="text-danger">*</span></label>
                                    <textarea name="message" id="smsMessage" class="form-control" rows="5" maxlength="480" placeholder="Enter your SMS message here..." required></textarea>
                                    <small class="text-muted"><span id="charCount">0</span> / 480 characters</small>
                                </div>

                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-success" onclick="return confirm('Send this SMS to all matching recipients?');">
                                        <i class="fas fa-paper-plane me-2"></i>Send Bulk SMS
                                    </button>
                                    <a href="{{ route('admin.sms.index') }}" class="btn btn-outline-secondary">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #fff5e6 0%, #ffe6cc 100%);">
                        <div class="card-body">
                            <h6 class="mb-3"><i class="fas fa-lightbulb me-2 text-warning"></i>Tips</h6>
                            <ul class="small mb-0 ps-3">
                                <li class="mb-2">Keep messages short — SMS is billed per segment</li>
                                <li class="mb-2">Service, status, and date filters all combine together</li>
                                <li class="mb-2">"Days before appointment" reminders require a service to be selected</li>
                                <li class="mb-2">Cancelled appointments are excluded unless you filter by "Cancelled" status</li>
                                <li>Check the recipient count before sending</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const filterType = document.getElementById('filterType');
        const serviceInput = document.getElementById('serviceInput');
        const statusInput = document.getElementById('statusInput');
        const daysLeftHint = document.getElementById('daysLeftHint');
        const dateFilters = {
            date: document.getElementById('dateFilter'),
            week: document.getElementById('weekFilter'),
            month: document.getElementById('monthFilter'),
            days_left: document.getElementById('daysLeftFilter'),
        };
        const recipientCountBox = document.getElementById('recipientCountBox');
        const recipientNumber = document.getElementById('recipientNumber');

        filterType.addEventListener('change', function() {
            Object.values(dateFilters).forEach(el => el.style.display = 'none');
            recipientCountBox.style.display = 'none';
            if (dateFilters[this.value]) {
                dateFilters[this.value].style.display = 'block';
            }

            const isDaysLeft = this.value === 'days_left';
            daysLeftHint.style.display = isDaysLeft ? 'block' : 'none';
            daysLeftHint.textContent = isDaysLeft && !serviceInput.value
                ? 'Select a service above — this reminder mode requires one.'
                : '';

            fetchRecipientCount();
        });

        function fetchRecipientCount() {
            const type = filterType.value;
            const params = new URLSearchParams({ filter_type: type });

            if (serviceInput.value) params.set('clinic_service_id', serviceInput.value);
            if (statusInput.value) params.set('status', statusInput.value);

            if (type === 'date') {
                const v = document.getElementById('dateInput').value;
                if (!v) return;
                params.set('date', v);
            } else if (type === 'week') {
                const start = document.getElementById('weekStartInput').value;
                const end = document.getElementById('weekEndInput').value;
                if (!start || !end) return;
                params.set('week_start', start);
                params.set('week_end', end);
            } else if (type === 'month') {
                const v = document.getElementById('monthInput').value;
                if (!v) return;
                params.set('month', v);
            } else if (type === 'days_left') {
                const days = document.getElementById('daysInput').value;
                if (days === '' || !serviceInput.value) return;
                params.set('days', days);
            }

            fetch('{{ route("admin.sms.recipient-count") }}?' + params.toString())
                .then(response => response.json())
                .then(data => {
                    recipientNumber.textContent = data.count;
                    recipientCountBox.style.display = 'block';
                })
                .catch(() => { recipientCountBox.style.display = 'none'; });
        }

        serviceInput.addEventListener('change', function() {
            if (filterType.value === 'days_left') {
                daysLeftHint.textContent = this.value ? '' : 'Select a service above — this reminder mode requires one.';
            }
            fetchRecipientCount();
        });

        statusInput.addEventListener('change', fetchRecipientCount);

        ['dateInput', 'weekStartInput', 'weekEndInput', 'monthInput', 'daysInput'].forEach(id => {
            const el = document.getElementById(id);
            if (el) el.addEventListener('change', fetchRecipientCount);
        });

        document.getElementById('smsMessage').addEventListener('input', function() {
            document.getElementById('charCount').textContent = this.value.length;
        });

        document.getElementById('smsForm').addEventListener('submit', function(e) {
            if (filterType.value === 'days_left' && !serviceInput.value) {
                e.preventDefault();
                daysLeftHint.style.display = 'block';
                daysLeftHint.textContent = 'Select a service above — this reminder mode requires one.';
                serviceInput.focus();
            }
        });
    </script>
</body>
</html>
