@php
    $allServicesList = [
        ['route' => 'general-practice', 'icon' => 'fas fa-stethoscope', 'label' => 'General Practice'],
        ['route' => 'general-surgery', 'icon' => 'fas fa-user-md', 'label' => 'General Surgery'],
        ['route' => 'obstetrics-gynaecology', 'icon' => 'fas fa-baby', 'label' => 'Obstetrics & Gynaecology'],
        ['route' => 'geriatric-care', 'icon' => 'fas fa-user-friends', 'label' => 'Center for Ageing & Geriatric Care (Elderly Care)'],
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
        ['route' => 'family-medicine-clinic', 'icon' => 'fas fa-house-medical', 'label' => 'Family Medicine Specialist Clinic'],
    ];
@endphp
<div class="services-menu mb-4" style="background: white; border-radius: 20px; padding: 30px; box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);">
    <h4 class="mb-4" style="font-weight: 700; color: #2d3e50;">All Services</h4>
    <div class="services-list">
        @foreach ($allServicesList as $svc)
            @php $isActive = ($active ?? null) === $svc['route']; @endphp
            <a href="{{ route('services.' . $svc['route']) }}" class="service-link {{ $isActive ? 'active' : '' }}" style="display: flex; align-items: center; padding: 12px 15px; margin-bottom: 8px; border-radius: 10px; text-decoration: none; background: {{ $isActive ? '#f3e5f5' : '#f8f9fa' }}; {{ $isActive ? 'border-left: 3px solid #a8207a;' : '' }} transition: all 0.3s ease;">
                <i class="{{ $svc['icon'] }} me-3" style="color: {{ $isActive ? '#a8207a' : '#666' }}; font-size: 1.1rem;"></i>
                <span style="color: {{ $isActive ? '#2d3e50' : '#666' }}; font-weight: {{ $isActive ? '600' : '500' }};">{{ $svc['label'] }}</span>
            </a>
        @endforeach
    </div>
</div>
