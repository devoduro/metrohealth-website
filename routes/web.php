<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BlogController;
// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Reviews
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

// About Us
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Who We Are
Route::get('/who-we-are', function () {
    return view('who-we-are-redesign');
})->name('who-we-are');

// Our Team
Route::get('/our-team', function () {
    return view('our-team-redesign');
})->name('team');

// Team Member Detail
Route::get('/teams/{slug}', function ($slug) {
    $teamMembers = [
        [
            'name' => 'Mr. Stephen Tawiah',
            'position' => 'Managing Director',
            'image' => asset('images/team/stephen-tawiah.png'),
            'specialty' => 'Leading Metro Health Hospital with strategic vision and excellence.',
            'phone' => '0241850091',
            'email' => 'md@metrohealthgh.com',
            'address' => '4 Barekese Road, Kumasi',
            'bio' => 'Mr. Stephen Tawiah serves as the Managing Director of Metro Health Hospital, providing strategic leadership and overseeing all operations. His vision and dedication ensure the hospital maintains its commitment to excellence in healthcare delivery.'
        ],
        [
            'name' => 'Dr. (Mrs) Phyllis Tawiah',
            'position' => 'Medical Director',
            'image' => asset('images/team/Dr(Mrs)-Phyllis-Tawiah.png'),
            'specialty' => 'Ensuring clinical excellence across all medical departments.',
            'phone' => '0241850091',
            'email' => 'medical.director@metrohealthgh.com',
            'address' => '4 Barekese Road, Kumasi',
            'bio' => 'Dr. (Mrs) Phyllis Tawiah is the Medical Director of Metro Health Hospital, bringing extensive experience in healthcare management and clinical excellence. She leads our medical team with a commitment to providing world-class patient care.'
        ],
        [
            'name' => 'Veronica Sabeng Poku',
            'position' => 'Administrator',
            'image' => asset('images/team/Veronica_Sabeng_Poku.png'),
            'specialty' => 'Managing hospital operations with efficiency and dedication.',
            'phone' => '0248555596',
            'email' => 'admin@metrohealthgh.com',
            'address' => '4 Barekese Road, Kumasi',
            'bio' => 'Veronica Sabeng Poku serves as the Administrator of Metro Health Hospital, managing day-to-day operations and ensuring smooth functioning of all hospital departments. Her organizational skills and dedication contribute to excellent patient care.'
        ],
        [
            'name' => 'Dr. Odeefour Ofori Amanfo',
            'position' => 'Deputy Administrator',
            'image' => asset('images/team/Dr_Odeefour_Ofori_Amanfo.png'),
            'specialty' => 'Supporting hospital administration with medical expertise and leadership.',
            'phone' => '0264840859',
            'email' => 'deputy.admin@metrohealthgh.com',
            'address' => '4 Barekese Road, Kumasi',
            'bio' => 'Dr. Odeefour Ofori Amanfo serves as the Deputy Administrator of Metro Health Hospital, supporting administrative operations and ensuring quality healthcare delivery. His medical expertise and administrative skills make him an invaluable member of the leadership team.'
        ],
        [
            'name' => 'Mary Ann Koomson',
            'position' => 'Human Resource Manager',
            'image' => asset('images/team/Mary_Ann_Koomson.png'),
            'specialty' => 'Building and developing our exceptional healthcare team.',
            'phone' => '0241850091',
            'email' => 'hr@metrohealthgh.com',
            'address' => '4 Barekese Road, Kumasi',
            'bio' => 'Mary Ann Koomson serves as the Human Resource Manager of Metro Health Hospital, managing recruitment, training, and staff development. She ensures Metro Health attracts and retains top medical talent and maintains a positive work environment.'
        ]
    ];

    $member = collect($teamMembers)->first(function ($member) use ($slug) {
        return Str::slug($member['name']) === $slug;
    });

    if (!$member) {
        abort(404);
    }

    return view('team-member-detail', ['member' => $member]);
})->name('team.show');

// Gallery
Route::get('/gallery', function () {
    return view('our-gallery-redesign');
})->name('gallery');

// Services
Route::prefix('services')->name('services.')->group(function () {
    Route::get('/', [ServiceController::class, 'index'])->name('index');
    Route::get('/general-practice', function () {
        return view('services.general-practice');
    })->name('general-practice');
    Route::get('/general-surgery', function () {
        return view('services.general-surgery');
    })->name('general-surgery');
    Route::get('/obstetrics-gynaecology', function () {
        return view('services.obstetrics-gynaecology');
    })->name('obstetrics-gynaecology');
    Route::get('/geriatric-care', function () {
        return view('services.geriatric-care');
    })->name('geriatric-care');
    Route::get('/neurology-neurosurgery', function () {
        return view('services.neurology-neurosurgery');
    })->name('neurology-neurosurgery');
    Route::get('/paediatrics', function () {
        return view('services.paediatrics');
    })->name('paediatrics');
    Route::get('/urology', function () {
        return view('services.urology');
    })->name('urology');
    Route::get('/orthopaedic', function () {
        return view('services.orthopaedic');
    })->name('orthopaedic');
    Route::get('/orthopedics', function () {
        return view('services.orthopaedic');
    })->name('orthopedics');
    Route::get('/ent-care', function () {
        return view('services.ent-care');
    })->name('ent-care');
    Route::get('/eye-care', function () {
        return view('services.eye-care');
    })->name('eye-care');
    Route::get('/plastic-surgery', function () {
        return view('services.plastic-surgery');
    })->name('plastic-surgery');
    Route::get('/internal-medicine', function () {
        return view('services.internal-medicine');
    })->name('internal-medicine');
    Route::get('/laboratory', function () {
        return view('services.laboratory');
    })->name('laboratory');
    Route::get('/radiology', function () {
        return view('services.radiology');
    })->name('radiology');
    Route::get('/pharmacy', function () {
        return view('services.pharmacy');
    })->name('pharmacy');
    Route::get('/{slug}', [ServiceController::class, 'show'])->name('show');
});

// Businesses & Organizations
Route::get('/businesses-organizations', [ProductController::class, 'index'])->name('businesses-organizations');

// Shop/Products
Route::prefix('shop')->name('shop.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/{slug}', [ProductController::class, 'show'])->name('show');
});

// Booking Appointments
Route::prefix('booking')->name('booking.')->group(function () {
    Route::get('/', [BookingController::class, 'index'])->name('index');
    Route::post('/', [BookingController::class, 'store'])->name('store');
    Route::get('/booking', [BookingController::class, 'index'])->name('booking');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/specialist-clinics', [BookingController::class, 'specialistClinics'])->name('specialist-clinics');
    Route::get('/api/service-price/{serviceId}/{hairType}', [BookingController::class, 'getServicePrice'])->name('api.service-price');
    Route::get('/success', [BookingController::class, 'success'])->name('success');
});

// Stripe Payment Routes
use App\Http\Controllers\StripePaymentController;

Route::prefix('stripe')->name('stripe.')->group(function () {
    Route::post('/create-checkout-session', [StripePaymentController::class, 'createCheckoutSession'])->name('checkout');
    Route::get('/success', [StripePaymentController::class, 'success'])->name('success');
    Route::get('/cancel', [StripePaymentController::class, 'cancel'])->name('cancel');
});

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Blog/News Routes
Route::prefix('news')->name('news-update.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('show');
});

// News & Articles Page
Route::get('/news-articles', function () {
    $posts = \App\Models\BlogPost::where('published', true)
        ->orderBy('published_at', 'desc')
        ->paginate(9);
    return view('news-articles', compact('posts'));
})->name('news-articles');

// FAQs Page
Route::get('/faqs', function () {
    return view('faqs');
})->name('faqs');

// Clinic Appointments
Route::prefix('clinic-appointments')->name('clinic-appointments.')->group(function () {
    Route::get('/', [\App\Http\Controllers\ClinicAppointmentController::class, 'index'])->name('index');
    Route::post('/', [\App\Http\Controllers\ClinicAppointmentController::class, 'store'])->name('store');
    Route::get('/success', [\App\Http\Controllers\ClinicAppointmentController::class, 'success'])->name('success');
    Route::get('/schedule', [\App\Http\Controllers\ClinicAppointmentController::class, 'getServiceSchedule'])->name('schedule');
});

// Admin Routes
use App\Http\Controllers\Admin\AdminController;

Route::prefix('admin')->name('admin.')->group(function () {
    // Root admin route - redirect to dashboard if authenticated, otherwise to login
    Route::get('/', function () {
        return auth()->check() ? redirect()->route('admin.dashboard') : redirect()->route('admin.login');
    });
    
    Route::get('/login', [AdminController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminController::class, 'login'])->name('login.submit');
    
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
        
        // Appointment/Booking Management
        Route::get('/bookings', [AdminController::class, 'bookings'])->name('bookings');
        Route::put('/bookings/{id}', [AdminController::class, 'updateBookingStatus'])->name('bookings.update');
        
        // Patient Management
        Route::get('/patients', [\App\Http\Controllers\Admin\PatientController::class, 'index'])->name('patients.index');
        Route::get('/patients/{email}', [\App\Http\Controllers\Admin\PatientController::class, 'show'])->name('patients.show');
        Route::get('/patients/export/csv', [\App\Http\Controllers\Admin\PatientController::class, 'export'])->name('patients.export');
        
        // Email Campaign Management
        Route::get('/emails', [\App\Http\Controllers\Admin\EmailCampaignController::class, 'index'])->name('emails.index');
        Route::get('/emails/create', [\App\Http\Controllers\Admin\EmailCampaignController::class, 'create'])->name('emails.create');
        Route::get('/emails/recipient-count', [\App\Http\Controllers\Admin\EmailCampaignController::class, 'getRecipientCount'])->name('emails.recipient-count');
        Route::post('/emails/send', [\App\Http\Controllers\Admin\EmailCampaignController::class, 'send'])->name('emails.send');
        Route::post('/emails/preview', [\App\Http\Controllers\Admin\EmailCampaignController::class, 'preview'])->name('emails.preview');
        
        // Medical Services Management
        Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class)->except(['show']);
        
        // Contact Messages
        Route::get('/contact-messages', [\App\Http\Controllers\Admin\ContactMessageController::class, 'index'])->name('contact-messages.index');
        Route::get('/contact-messages/{message}', [\App\Http\Controllers\Admin\ContactMessageController::class, 'show'])->name('contact-messages.show');
        Route::patch('/contact-messages/{message}/status', [\App\Http\Controllers\Admin\ContactMessageController::class, 'updateStatus'])->name('contact-messages.update-status');
        Route::delete('/contact-messages/{message}', [\App\Http\Controllers\Admin\ContactMessageController::class, 'destroy'])->name('contact-messages.destroy');
        
        // Reviews Management
        Route::resource('reviews', \App\Http\Controllers\Admin\ReviewController::class);
        Route::patch('/reviews/{review}/toggle-approval', [\App\Http\Controllers\Admin\ReviewController::class, 'toggleApproval'])->name('reviews.toggle-approval');
        
        // Blog/News Management
        Route::resource('blog', \App\Http\Controllers\Admin\BlogController::class);
        Route::post('/blog/{blog}/toggle-publish', [\App\Http\Controllers\Admin\BlogController::class, 'togglePublish'])->name('blog.toggle-publish');
    });
});

// Dashboard Routes
Route::prefix('dashboard')->name('dashboard.')->group(function () {
    require base_path('routes/dashboard.php');
});
