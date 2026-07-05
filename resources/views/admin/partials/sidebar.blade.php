<div class="admin-sidebar">
    <div class="sidebar-header">
        <img src="{{ asset('images/logo/logo.png') }}" alt="Metro Health Logo" style="height: 60px; margin-bottom: 10px;">
        <p style="font-size: 0.75rem; color: #84a33f; margin: 0; letter-spacing: 1px; text-transform: uppercase; font-weight: 600;">Healthcare Management</p>
    </div>

    <nav class="sidebar-nav">
        @if(auth()->user()->isDoctor())
            <a href="{{ route('admin.staff-dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.staff-dashboard') || request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-home"></i>
                <span>My Dashboard</span>
            </a>

            <a href="{{ route('admin.appointments.past') }}" class="sidebar-link {{ request()->routeIs('admin.appointments.past') ? 'active' : '' }}">
                <i class="fas fa-history"></i>
                <span>Past Appointments</span>
            </a>
        @else
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>

            @if(auth()->user()->isNurse())
            <a href="{{ route('admin.staff-dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.staff-dashboard') ? 'active' : '' }}">
                <i class="fas fa-user-nurse"></i>
                <span>My Dashboard</span>
            </a>
            @endif

            <!-- Healthcare Services Section -->
            <div class="sidebar-section">
                <p style="padding: 0.5rem 1.5rem; margin: 0.5rem 0; font-size: 0.7rem; color: #84a33f; text-transform: uppercase; font-weight: 600; letter-spacing: 0.5px;">Healthcare Services</p>
            </div>

            <a href="{{ route('admin.patients.index') }}" class="sidebar-link {{ request()->routeIs('admin.patients.*') ? 'active' : '' }}">
                <i class="fas fa-users"></i>
                <span>Patients</span>
            </a>

            <a href="{{ route('admin.appointments.index') }}" class="sidebar-link {{ request()->routeIs('admin.appointments.*') && !request()->routeIs('admin.appointments.past') ? 'active' : '' }}">
                <i class="fas fa-calendar-plus"></i>
                <span>Book Appointment</span>
            </a>

            <a href="{{ route('admin.appointments.past') }}" class="sidebar-link {{ request()->routeIs('admin.appointments.past') ? 'active' : '' }}">
                <i class="fas fa-history"></i>
                <span>Past Appointments</span>
            </a>

            @unless(auth()->user()->isFrontDeskStaff())
            <a href="{{ route('admin.doctors.index') }}" class="sidebar-link {{ request()->routeIs('admin.doctors.*') ? 'active' : '' }}">
                <i class="fas fa-user-md"></i>
                <span>Doctors</span>
            </a>

            <a href="{{ route('admin.clinic-services.index') }}" class="sidebar-link {{ request()->routeIs('admin.clinic-services.*') ? 'active' : '' }}">
                <i class="fas fa-list-alt"></i>
                <span>Clinic Services</span>
            </a>
            @endunless

            @unless(auth()->user()->isFrontDeskStaff())
            <!-- Communication Section -->
            <div class="sidebar-section">
                <p style="padding: 0.5rem 1.5rem; margin: 0.5rem 0; font-size: 0.7rem; color: #84a33f; text-transform: uppercase; font-weight: 600; letter-spacing: 0.5px;">Communication</p>
            </div>

            <a href="{{ route('admin.emails.index') }}" class="sidebar-link {{ request()->routeIs('admin.emails.*') ? 'active' : '' }}">
                <i class="fas fa-envelope"></i>
                <span>Email Campaigns</span>
            </a>

            <a href="{{ route('admin.sms.index') }}" class="sidebar-link {{ request()->routeIs('admin.sms.*') ? 'active' : '' }}">
                <i class="fas fa-sms"></i>
                <span>Bulk SMS</span>
            </a>

            <a href="{{ route('admin.contact-messages.index') }}" class="sidebar-link {{ request()->routeIs('admin.contact-messages.*') ? 'active' : '' }}">
                <i class="fas fa-envelope"></i>
                <span>Contact Messages</span>
                @php
                    $new_messages = \App\Models\ContactSubmission::where('status', 'new')->count();
                @endphp
                @if($new_messages > 0)
                <span class="badge bg-danger ms-auto">{{ $new_messages }}</span>
                @endif
            </a>

            <a href="{{ route('admin.reviews.index') }}" class="sidebar-link {{ request()->routeIs('admin.reviews.*') ? 'active' : '' }}">
                <i class="fas fa-star"></i>
                <span>Reviews</span>
                @php
                    $pending_reviews = \App\Models\Review::where('is_approved', false)->count();
                @endphp
                @if($pending_reviews > 0)
                <span class="badge bg-warning text-dark ms-auto">{{ $pending_reviews }}</span>
                @endif
            </a>

            <a href="{{ route('admin.blog.index') }}" class="sidebar-link {{ request()->routeIs('admin.blog.*') ? 'active' : '' }}">
                <i class="fas fa-newspaper"></i>
                <span>News & Articles</span>
                @php
                    $draft_posts = \App\Models\BlogPost::where('published', false)->count();
                @endphp
                @if($draft_posts > 0)
                <span class="badge bg-info text-dark ms-auto">{{ $draft_posts }}</span>
                @endif
            </a>
            @endunless

            @if(auth()->user()->isAdmin())
            <!-- Administration Section -->
            <div class="sidebar-section">
                <p style="padding: 0.5rem 1.5rem; margin: 0.5rem 0; font-size: 0.7rem; color: #84a33f; text-transform: uppercase; font-weight: 600; letter-spacing: 0.5px;">Administration</p>
            </div>

            <a href="{{ route('admin.staff.index') }}" class="sidebar-link {{ request()->routeIs('admin.staff.*') ? 'active' : '' }}">
                <i class="fas fa-user-shield"></i>
                <span>Staff Accounts</span>
            </a>
            @endif
        @endif

        <div class="sidebar-divider"></div>

        <a href="{{ route('home') }}" class="sidebar-link" target="_blank">
            <i class="fas fa-globe"></i>
            <span>View Website</span>
        </a>

        <a href="{{ route('admin.logout') }}" class="sidebar-link"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </nav>

    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>

<style>
.admin-sidebar {
    position: fixed;
    left: 0;
    top: 0;
    width: 260px;
    height: 100vh;
    background: white;
    box-shadow: 2px 0 10px rgba(0,0,0,0.1);
    z-index: 1000;
    overflow-y: auto;
}

.sidebar-header {
    padding: 2rem 1.5rem;
    text-align: center;
    border-bottom: 2px solid #f0f0f0;
}

.sidebar-header h5 {
    font-weight: 700;
    color: var(--ashlocs-dark);
}

.sidebar-nav {
    padding: 1rem 0;
}

.sidebar-link {
    display: flex;
    align-items: center;
    padding: 1rem 1.5rem;
    color: #666;
    text-decoration: none;
    transition: all 0.3s ease;
    position: relative;
}

.sidebar-link:hover {
    background: var(--ashlocs-light);
    color: var(--ashlocs-orange);
}

.sidebar-link.active {
    background: var(--ashlocs-light);
    color: var(--ashlocs-orange);
    border-left: 4px solid var(--ashlocs-orange);
}

.sidebar-link i {
    width: 20px;
    margin-right: 1rem;
    font-size: 1.1rem;
}

.sidebar-divider {
    height: 1px;
    background: #f0f0f0;
    margin: 1rem 0;
}

.admin-content {
    margin-left: 260px;
    min-height: 100vh;
}
</style>
