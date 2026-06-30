<div class="admin-topbar">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-0" style="font-weight: 700; color: var(--ashlocs-dark);">
                    <?php echo $__env->yieldContent('page-title', 'Dashboard'); ?>
                </h4>
            </div>
            <div class="d-flex align-items-center gap-3">
                <span class="text-muted">Welcome, <strong><?php echo e(Auth::user()->name ?? 'Admin'); ?></strong></span>
                <div class="admin-user-avatar">
                    <i class="fas fa-user-circle"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if(session('success')): ?>
<div class="container-fluid mt-3">
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 15px;">
        <i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
</div>
<?php endif; ?>

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
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/metrohealth/resources/views/admin/partials/topbar.blade.php ENDPATH**/ ?>