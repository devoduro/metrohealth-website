<?php
    $allServicesList = [
        ['route' => 'general-practice', 'icon' => 'fas fa-stethoscope', 'label' => 'General Practice'],
        ['route' => 'general-surgery', 'icon' => 'fas fa-user-md', 'label' => 'General Surgery'],
        ['route' => 'obstetrics-gynaecology', 'icon' => 'fas fa-baby', 'label' => 'Obstetrics & Gynaecology'],
        ['route' => 'geriatric-care', 'icon' => 'fas fa-user-friends', 'label' => 'Geriatric Care'],
        ['route' => 'paediatrics', 'icon' => 'fas fa-child', 'label' => 'Paediatrics'],
        ['route' => 'urology', 'icon' => 'fas fa-kidneys', 'label' => 'Urology'],
        ['route' => 'orthopaedic', 'icon' => 'fas fa-bone', 'label' => 'Orthopaedic'],
        ['route' => 'ent-care', 'icon' => 'fas fa-head-side-mask', 'label' => 'ENT Care'],
        ['route' => 'eye-care', 'icon' => 'fas fa-eye', 'label' => 'Eye Care'],
        ['route' => 'plastic-surgery', 'icon' => 'fas fa-user-md', 'label' => 'Plastic Surgery'],
        ['route' => 'pharmacy', 'icon' => 'fas fa-pills', 'label' => 'Pharmacy'],
        ['route' => 'laboratory', 'icon' => 'fas fa-flask', 'label' => 'General Lab'],
        ['route' => 'physician-clinic', 'icon' => 'fas fa-user-doctor', 'label' => 'Physician\'s Clinic'],
        ['route' => 'dietetics', 'icon' => 'fas fa-apple-alt', 'label' => 'Dietetics'],
        ['route' => 'endoscopy', 'icon' => 'fas fa-microscope', 'label' => 'Endoscopy'],
        ['route' => 'radiology', 'icon' => 'fas fa-x-ray', 'label' => 'Radiology & Medical Imaging'],
        ['route' => 'ambulance-service', 'icon' => 'fas fa-ambulance', 'label' => 'Ambulance Service'],
    ];
?>
<div class="services-menu mb-4" style="background: white; border-radius: 20px; padding: 30px; box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);">
    <h4 class="mb-4" style="font-weight: 700; color: #2d3e50;">All Services</h4>
    <div class="services-list">
        <?php $__currentLoopData = $allServicesList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $svc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $isActive = ($active ?? null) === $svc['route']; ?>
            <a href="<?php echo e(route('services.' . $svc['route'])); ?>" class="service-link <?php echo e($isActive ? 'active' : ''); ?>" style="display: flex; align-items: center; padding: 12px 15px; margin-bottom: 8px; border-radius: 10px; text-decoration: none; background: <?php echo e($isActive ? '#f3e5f5' : '#f8f9fa'); ?>; <?php echo e($isActive ? 'border-left: 3px solid #a8207a;' : ''); ?> transition: all 0.3s ease;">
                <i class="<?php echo e($svc['icon']); ?> me-3" style="color: <?php echo e($isActive ? '#a8207a' : '#666'); ?>; font-size: 1.1rem;"></i>
                <span style="color: <?php echo e($isActive ? '#2d3e50' : '#666'); ?>; font-weight: <?php echo e($isActive ? '600' : '500'); ?>;"><?php echo e($svc['label']); ?></span>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\metrohealth-web\resources\views/partials/services-sidebar.blade.php ENDPATH**/ ?>