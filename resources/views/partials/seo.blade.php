{{-- SEO Meta Tags Component --}}
{{-- Usage: @include('partials.seo', ['title' => 'Page Title', 'description' => 'Description', 'image' => 'image.jpg']) --}}

@php
    $siteTitle = 'Metro Health - Quality Healthcare Services';
    $pageTitle = isset($title) ? $title . ' | Metro Health' : $siteTitle;
    $metaDescription = $description ?? 'Quality healthcare services including specialist clinics, diagnostic services, and comprehensive medical care. Book your appointment with Metro Health today.';
    $metaImage = isset($image) ? asset($image) : asset('images/2026-01-12-J8o94jxc.png');
    $metaUrl = url()->current();
    $keywords = $keywords ?? 'healthcare, medical services, hospital, clinic, specialist doctors, diagnostic services, health insurance, medical care, Ghana healthcare';
@endphp

{{-- Primary Meta Tags --}}
<title>{{ $pageTitle }}</title>
<meta name="title" content="{{ $pageTitle }}">
<meta name="description" content="{{ $metaDescription }}">
<meta name="keywords" content="{{ $keywords }}">
<meta name="author" content="Metro Health">
<meta name="robots" content="index, follow">
<parameter name="language" content="English">
<meta name="revisit-after" content="7 days">

{{-- Open Graph / Facebook --}}
<meta property="og:type" content="{{ $ogType ?? 'website' }}">
<meta property="og:url" content="{{ $metaUrl }}">
<meta property="og:title" content="{{ $pageTitle }}">
<meta property="og:description" content="{{ $metaDescription }}">
<meta property="og:image" content="{{ $metaImage }}">
<meta property="og:site_name" content="Metro Health">
<meta property="og:locale" content="en_GH">

{{-- Twitter --}}
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ $metaUrl }}">
<meta property="twitter:title" content="{{ $pageTitle }}">
<meta property="twitter:description" content="{{ $metaDescription }}">
<meta property="twitter:image" content="{{ $metaImage }}">

{{-- Additional Meta Tags --}}
<meta name="theme-color" content="#FF6B35">
<link rel="canonical" href="{{ $canonical ?? $metaUrl }}">

{{-- Business Contact Info --}}
<meta name="contact" content="info@metrohealth.com.gh">
<meta name="geo.region" content="GH">
<meta name="geo.placename" content="Accra, Ghana">
