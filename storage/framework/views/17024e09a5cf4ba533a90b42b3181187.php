<div class="admin-sidebar">
    <div class="sidebar-header">
        <img src="<?php echo e(asset('images/logo/logo.png')); ?>" alt="Metro Health Logo" style="height: 60px; margin-bottom: 10px;">
        <p style="font-size: 0.75rem; color: #84a33f; margin: 0; letter-spacing: 1px; text-transform: uppercase; font-weight: 600;">Healthcare Management</p>
    </div>

    <nav class="sidebar-nav">
        <?php if(auth()->user()->isClinicalStaff()): ?>
            <a href="<?php echo e(route('admin.staff-dashboard')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.staff-dashboard') || request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
                <i class="fas fa-home"></i>
                <span>My Dashboard</span>
            </a>

            <a href="<?php echo e(route('admin.appointments.past')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.appointments.past') ? 'active' : ''); ?>">
                <i class="fas fa-history"></i>
                <span>Past Appointments</span>
            </a>
        <?php else: ?>
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>

            <?php if(auth()->user()->isFrontDeskStaff() && auth()->user()->clinicServices->isNotEmpty()): ?>
            <a href="<?php echo e(route('admin.staff-dashboard')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.staff-dashboard') ? 'active' : ''); ?>">
                <i class="fas fa-user-nurse"></i>
                <span>My Dashboard</span>
            </a>
            <?php endif; ?>

            <!-- Healthcare Services Section -->
            <div class="sidebar-section">
                <p style="padding: 0.5rem 1.5rem; margin: 0.5rem 0; font-size: 0.7rem; color: #84a33f; text-transform: uppercase; font-weight: 600; letter-spacing: 0.5px;">Healthcare Services</p>
            </div>

            <a href="<?php echo e(route('admin.patients.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.patients.*') ? 'active' : ''); ?>">
                <i class="fas fa-users"></i>
                <span>Patients</span>
            </a>

            <a href="<?php echo e(route('admin.appointments.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.appointments.*') && !request()->routeIs('admin.appointments.past') ? 'active' : ''); ?>">
                <i class="fas fa-calendar-plus"></i>
                <span>Book Appointment</span>
            </a>

            <a href="<?php echo e(route('admin.appointments.past')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.appointments.past') ? 'active' : ''); ?>">
                <i class="fas fa-history"></i>
                <span>Past Appointments</span>
            </a>

            <?php $fullAccess = auth()->user()->dashboardScope() === 'full'; ?>

            <?php if($fullAccess || auth()->user()->hasPermission('manage_doctors')): ?>
            <a href="<?php echo e(route('admin.doctors.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.doctors.*') ? 'active' : ''); ?>">
                <i class="fas fa-user-md"></i>
                <span>Doctors</span>
            </a>
            <?php endif; ?>

            <?php if($fullAccess || auth()->user()->hasPermission('manage_clinic_services')): ?>
            <a href="<?php echo e(route('admin.clinic-services.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.clinic-services.*') || request()->routeIs('admin.service-categories.*') ? 'active' : ''); ?>">
                <i class="fas fa-list-alt"></i>
                <span>Our Services</span>
            </a>
            <?php endif; ?>

            <?php if($fullAccess
                || auth()->user()->hasPermission('manage_emails')
                || auth()->user()->hasPermission('manage_sms')
                || auth()->user()->hasPermission('manage_contact_messages')
                || auth()->user()->hasPermission('manage_reviews')
                || auth()->user()->hasPermission('manage_blog')): ?>
            <!-- Communication Section -->
            <div class="sidebar-section">
                <p style="padding: 0.5rem 1.5rem; margin: 0.5rem 0; font-size: 0.7rem; color: #84a33f; text-transform: uppercase; font-weight: 600; letter-spacing: 0.5px;">Communication</p>
            </div>

            <?php if($fullAccess || auth()->user()->hasPermission('manage_emails')): ?>
            <a href="<?php echo e(route('admin.emails.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.emails.*') ? 'active' : ''); ?>">
                <i class="fas fa-envelope"></i>
                <span>Email Campaigns</span>
            </a>
            <?php endif; ?>

            <?php if($fullAccess || auth()->user()->hasPermission('manage_sms')): ?>
            <a href="<?php echo e(route('admin.sms.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.sms.*') ? 'active' : ''); ?>">
                <i class="fas fa-sms"></i>
                <span>Bulk SMS</span>
            </a>
            <?php endif; ?>

            <?php if($fullAccess || auth()->user()->hasPermission('manage_contact_messages')): ?>
            <a href="<?php echo e(route('admin.contact-messages.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.contact-messages.*') ? 'active' : ''); ?>">
                <i class="fas fa-envelope"></i>
                <span>Contact Messages</span>
                <?php
                    $new_messages = \App\Models\ContactSubmission::where('status', 'new')->count();
                ?>
                <?php if($new_messages > 0): ?>
                <span class="badge bg-danger ms-auto"><?php echo e($new_messages); ?></span>
                <?php endif; ?>
            </a>
            <?php endif; ?>

            <?php if($fullAccess || auth()->user()->hasPermission('manage_reviews')): ?>
            <a href="<?php echo e(route('admin.reviews.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.reviews.*') ? 'active' : ''); ?>">
                <i class="fas fa-star"></i>
                <span>Reviews</span>
                <?php
                    $pending_reviews = \App\Models\Review::where('is_approved', false)->count();
                ?>
                <?php if($pending_reviews > 0): ?>
                <span class="badge bg-warning text-dark ms-auto"><?php echo e($pending_reviews); ?></span>
                <?php endif; ?>
            </a>
            <?php endif; ?>

            <?php if($fullAccess || auth()->user()->hasPermission('manage_blog')): ?>
            <a href="<?php echo e(route('admin.blog.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.blog.*') ? 'active' : ''); ?>">
                <i class="fas fa-newspaper"></i>
                <span>News & Articles</span>
                <?php
                    $draft_posts = \App\Models\BlogPost::where('published', false)->count();
                ?>
                <?php if($draft_posts > 0): ?>
                <span class="badge bg-info text-dark ms-auto"><?php echo e($draft_posts); ?></span>
                <?php endif; ?>
            </a>
            <?php endif; ?>
            <?php endif; ?>

            <?php if(auth()->user()->isAdmin()): ?>
            <!-- Administration Section -->
            <div class="sidebar-section">
                <p style="padding: 0.5rem 1.5rem; margin: 0.5rem 0; font-size: 0.7rem; color: #84a33f; text-transform: uppercase; font-weight: 600; letter-spacing: 0.5px;">Administration</p>
            </div>

            <a href="<?php echo e(route('admin.staff.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.staff.*') ? 'active' : ''); ?>">
                <i class="fas fa-user-shield"></i>
                <span>Staff Accounts</span>
            </a>

            <a href="<?php echo e(route('admin.roles.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.roles.*') ? 'active' : ''); ?>">
                <i class="fas fa-user-tag"></i>
                <span>Roles & Permissions</span>
            </a>
            <?php endif; ?>
        <?php endif; ?>

        <div class="sidebar-divider"></div>

        <a href="<?php echo e(route('home')); ?>" class="sidebar-link" target="_blank">
            <i class="fas fa-globe"></i>
            <span>View Website</span>
        </a>

        <a href="<?php echo e(route('admin.logout')); ?>" class="sidebar-link"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </nav>

    <form id="logout-form" action="<?php echo e(route('admin.logout')); ?>" method="POST" style="display: none;">
        <?php echo csrf_field(); ?>
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
<?php /**PATH C:\xampp\htdocs\metrohealth-web\resources\views/admin/partials/sidebar.blade.php ENDPATH**/ ?>