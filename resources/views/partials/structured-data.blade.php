{{-- Structured Data (JSON-LD) for SEO --}}
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Hospital",
  "name": "Metro Health Hospital",
  "image": "{{ asset('images/2026-01-12-J8o94jxc.png') }}",
  "description": "Quality healthcare services including specialist clinics, diagnostic services, and comprehensive medical care in Ghana.",
  "url": "{{ url('/') }}",
  "telephone": "+233241850091",
  "email": "info@metrohealth.com.gh",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Metro Health Hospital",
    "addressLocality": "Accra",
    "addressRegion": "Greater Accra",
    "addressCountry": "GH"
  },
  "openingHoursSpecification": [
    {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
      "opens": "00:00",
      "closes": "23:59"
    }
  ],
  "acceptsReservations": "True",
  "areaServed": {
    "@type": "Country",
    "name": "Ghana"
  },
  "medicalSpecialty": [
    "Obstetrics and Gynaecology",
    "Pediatrics",
    "ENT",
    "Neurology",
    "General Medicine",
    "Diagnostic Services"
  ],
  "hasOfferCatalog": {
    "@type": "OfferCatalog",
    "name": "Medical Services",
    "itemListElement": [
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "MedicalProcedure",
          "name": "Specialist Clinics",
          "description": "Obstetrics and Gynaecology, Pediatrics, ENT, and other specialist medical services"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "MedicalTest",
          "name": "Diagnostic Services",
          "description": "Laboratory tests, imaging, and comprehensive diagnostic services"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "MedicalProcedure",
          "name": "General Medical Care",
          "description": "Comprehensive healthcare services for all ages"
        }
      }
    ]
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.8",
    "reviewCount": "250"
  }
}
</script>
