<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Patients | Metro Health Admin</title>

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
        @section('page-title', 'Import Patients')
        @include('admin.partials.topbar')

        <div class="container-fluid p-4">
            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            <div class="row">
                <div class="col-lg-7">
                    <div class="admin-card">
                        <div class="admin-card-header">
                            <h5><i class="fas fa-file-import me-2"></i>Import Patients</h5>
                            <a href="{{ route('admin.patients.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Back to Patients
                            </a>
                        </div>
                        <div class="admin-card-body">
                            <p class="text-muted">Upload a CSV file with columns in this order: <strong>Full Name, Phone, Address</strong>. Existing patients are matched by phone number and updated; new ones are created.</p>

                            <a href="{{ route('admin.patients.import-template') }}" class="btn btn-outline-success mb-4">
                                <i class="fas fa-download me-2"></i>Download CSV Template
                            </a>

                            <form action="{{ route('admin.patients.import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <label class="form-label fw-bold">CSV File *</label>
                                    <input type="file" name="file" class="form-control" accept=".csv,text/csv" required>
                                    @error('file')<span class="text-danger small d-block">{{ $message }}</span>@enderror
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-upload me-2"></i>Import Patients
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #fff5e6 0%, #ffe6cc 100%);">
                        <div class="card-body">
                            <h6 class="mb-3"><i class="fas fa-lightbulb me-2 text-warning"></i>Tips</h6>
                            <ul class="small mb-0 ps-3">
                                <li class="mb-2">The first row can be a header ("Full Name, Phone, Address") or you can start directly with data — it's detected automatically.</li>
                                <li class="mb-2">Rows missing a name or phone number are skipped.</li>
                                <li class="mb-2">Phone numbers are normalized automatically (e.g. 0241234567 and 233241234567 are treated as the same patient).</li>
                                <li>Imported patients become searchable immediately when booking an internal appointment.</li>
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
