<div class="admin-topbar">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-0" style="font-weight: 700; color: var(--ashlocs-dark);">
                    @yield('page-title', 'Dashboard')
                </h4>
            </div>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center gap-3 text-decoration-none dropdown-toggle" id="userMenuDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="text-muted">Welcome, <strong>{{ Auth::user()->name ?? 'Admin' }}</strong></span>
                    <div class="admin-user-avatar">
                        <i class="fas fa-user-circle"></i>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenuDropdown">
                    <li><a class="dropdown-item" href="{{ route('admin.profile.edit') }}"><i class="fas fa-user-edit me-2"></i>My Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.logout') }}"
                           onclick="event.preventDefault(); document.getElementById('topbar-logout-form').submit();">
                            <i class="fas fa-sign-out-alt me-2"></i>Logout
                        </a>
                    </li>
                </ul>
                <form id="topbar-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
<div class="container-fluid mt-3">
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 15px;">
        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
</div>
@endif

<style>
.admin-topbar {
    background: white;
    padding: 1.5rem 0;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    margin-bottom: 2rem;
}

.admin-user-avatar {
    width: 40px;
    height: 40px;
    background: var(--ashlocs-light);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--ashlocs-orange);
    font-size: 1.5rem;
}
</style>
