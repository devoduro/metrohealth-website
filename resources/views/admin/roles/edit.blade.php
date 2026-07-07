<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Role | Metro Health Admin</title>

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
        @section('page-title', 'Edit Role')
        @include('admin.partials.topbar')

        <div class="container-fluid p-4">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fas fa-edit me-2"></i>Edit Role: {{ $role->name }}</h5>
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Roles
                    </a>
                </div>
                <div class="admin-card-body">
                    <form action="{{ route('admin.roles.update', $role) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label">Role Name *</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $role->name) }}" required>
                                @error('name')<span class="text-danger small d-block">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Dashboard Type *</label>
                                <select name="dashboard_scope" class="form-select" required {{ $role->is_system ? 'disabled' : '' }}>
                                    @foreach(\App\Models\Role::dashboardScopes() as $scope => $description)
                                    <option value="{{ $scope }}" {{ old('dashboard_scope', $role->dashboard_scope) == $scope ? 'selected' : '' }}>{{ ucfirst($scope) }}</option>
                                    @endforeach
                                </select>
                                @if($role->is_system)
                                <small class="text-muted">Built-in roles keep their original dashboard type.</small>
                                <input type="hidden" name="dashboard_scope" value="{{ $role->dashboard_scope }}">
                                @else
                                <small class="text-muted" id="scopeHint"></small>
                                @endif
                                @error('dashboard_scope')<span class="text-danger small d-block">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-12" id="permissionsSection">
                                <hr>
                                <label class="form-label fw-bold">Additional Permissions</label>
                                <p class="text-muted small">Only applies to Clinical and Front Desk dashboard types — tick any admin section this role should also be able to reach.</p>
                                <div class="row">
                                    @foreach(\App\Models\Role::availablePermissions() as $key => $label)
                                    <div class="col-md-4 mb-2">
                                        <div class="form-check">
                                            <input type="checkbox" name="permissions[]" value="{{ $key }}" class="form-check-input" id="perm{{ $key }}"
                                                {{ in_array($key, old('permissions', $role->permissions ?? [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="perm{{ $key }}">{{ $label }}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-save me-2"></i>Update Role
                                </button>
                                <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary btn-lg">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const scopeDescriptions = @json(\App\Models\Role::dashboardScopes());
        const scopeSelect = document.querySelector('select[name="dashboard_scope"]:not([disabled])');
        const scopeHint = document.getElementById('scopeHint');
        const permissionsSection = document.getElementById('permissionsSection');
        const activeScopeValue = '{{ old('dashboard_scope', $role->dashboard_scope) }}';

        function updateScopeUI() {
            const value = scopeSelect ? scopeSelect.value : activeScopeValue;
            if (scopeHint) {
                scopeHint.textContent = scopeDescriptions[value] || '';
            }
            permissionsSection.style.display = value === 'full' ? 'none' : 'block';
        }

        if (scopeSelect) {
            scopeSelect.addEventListener('change', updateScopeUI);
        }
        updateScopeUI();
    </script>
</body>
</html>
