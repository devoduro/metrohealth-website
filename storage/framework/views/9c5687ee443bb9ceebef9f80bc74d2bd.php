


<?php
    $siteTitle = 'Metro Health - Quality Healthcare Services';
    $pageTitle = isset($title) ? $title . ' | Metro Health' : $siteTitle;
    $metaDescription = $description ?? 'Quality healthcare services including specialist clinics, diagnostic services, and comprehensive medical care. Book your appointment with Metro Health today.';
    $metaImage = isset($image) ? asset($image) : asset('images/2026-01-12-J8o94jxc.png');
    $metaUrl = url()->current();
    $keywords = $keywords ?? 'healthcare, medical services, hospital, clinic, specialist doctors, diagnostic services, health insurance, medical care, Ghana healthcare';
?>


<title><?php echo e($pageTitle); ?></title>
<meta name="title" content="<?php echo e($pageTitle); ?>">
<meta name="description" content="<?php echo e($metaDescription); ?>">
<meta name="keywords" content="<?php echo e($keywords); ?>">
<meta name="author" content="Metro Health">
<meta name="robots" content="index, follow">
<parameter name="language" content="English">
<meta name="revisit-after" content="7 days">


<meta property="og:type" content="<?php echo e($ogType ?? 'website'); ?>">
<meta property="og:url" content="<?php echo e($metaUrl); ?>">
<meta property="og:title" content="<?php echo e($pageTitle); ?>">
<meta property="og:description" content="<?php echo e($metaDescription); ?>">
<meta property="og:image" content="<?php echo e($metaImage); ?>">
<meta property="og:site_name" content="Metro Health">
<meta property="og:locale" content="en_GH">


<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="<?php echo e($metaUrl); ?>">
<meta property="twitter:title" content="<?php echo e($pageTitle); ?>">
<meta property="twitter:description" content="<?php echo e($metaDescription); ?>">
<meta property="twitter:image" content="<?php echo e($metaImage); ?>">


<meta name="theme-color" content="#FF6B35">
<link rel="canonical" href="<?php echo e($canonical ?? $metaUrl); ?>">


<meta name="contact" content="info@metrohealth.com.gh">
<meta name="geo.region" content="GH">
<meta name="geo.placename" content="Accra, Ghana">
<?php /**PATH C:\xampp\htdocs\metrohealth\resources\views/partials/seo.blade.php ENDPATH**/ ?>