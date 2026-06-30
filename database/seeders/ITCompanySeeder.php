<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Product;
use App\Models\Client;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\CompanySetting;

class ITCompanySeeder extends Seeder
{
    public function run(): void
    {
        // Services
        $services = [
            [
                'title' => 'Application Development',
                'description' => 'Custom software tailored to your specific business needs.',
                'icon' => 'fas fa-laptop-code',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Database Management',
                'description' => 'Secure and efficient data storage solutions.',
                'icon' => 'fas fa-database',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Network Administration',
                'description' => 'Robust network infrastructure setup and maintenance.',
                'icon' => 'fas fa-network-wired',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'CCTV Installation',
                'description' => 'Advanced security surveillance systems.',
                'icon' => 'fas fa-video',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Bulk SMS Campaigns',
                'description' => 'Targeted messaging for effective communication.',
                'icon' => 'fas fa-sms',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'IT Consultancy',
                'description' => 'Expert guidance on digital transformation.',
                'icon' => 'fas fa-headset',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        // Products
        $products = [
            [
                'name' => 'DigiSchool',
                'description' => 'A comprehensive school management ecosystem tailored for Ghanaian institutions. Manages admissions, fees, academics and student records seamlessly.',
                'icon' => 'fas fa-graduation-cap',
                'link' => '#',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'SmartBulk SMS',
                'description' => 'High-performance bulk messaging platform with instant delivery reports. Ideal for schools, churches and businesses to reach thousands instantly.',
                'icon' => 'fas fa-comments',
                'link' => '#',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'ChurchCliq',
                'description' => 'Modern administration tool for religious organizations. Track membership, tithes, donations and events in one secure cloud platform.',
                'icon' => 'fas fa-church',
                'link' => '#',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'DigiBallot',
                'description' => 'Secure, transparent and user-friendly electronic voting system. Perfect for school elections, associations and organizational polls.',
                'icon' => 'fas fa-vote-yea',
                'link' => '#',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'DocBox',
                'description' => 'Digital archiving solution. Digitize, store and retrieve physical documents with powerful search capabilities and secure access controls.',
                'icon' => 'fas fa-file-archive',
                'link' => '#',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'SHSAdmissions',
                'description' => 'Streamlined admission portal for Senior High Schools. Automates placement verification, form filling and reporting for seamless enrollment.',
                'icon' => 'fas fa-user-check',
                'link' => '#',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }

        // Clients
        $clients = [
            [
                'name' => 'Kumasi Metropolitan Assembly',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Coat_of_arms_of_Ghana.svg/800px-Coat_of_arms_of_Ghana.svg.png',
                'website' => null,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Parliament of Ghana',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Coat_of_arms_of_Ghana.svg/800px-Coat_of_arms_of_Ghana.svg.png',
                'website' => null,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Prempeh College',
                'logo' => 'https://prempehcollege.edu.gh/wp-content/uploads/2023/01/cropped-logo.png',
                'website' => 'https://prempehcollege.edu.gh',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'St. Louis College of Education',
                'logo' => 'https://slce.edu.gh/wp-content/uploads/2020/09/slce-logo.png',
                'website' => 'https://slce.edu.gh',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Metro Hospital Kumasi',
                'logo' => null,
                'website' => null,
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Excel Education Centre',
                'logo' => null,
                'website' => null,
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }

        // Testimonials
        $testimonials = [
            [
                'content' => 'HiCliQs transformed our church administrative processes with ChurchCliq. The system is intuitive, secure and has saved us countless hours of paperwork. We can\'t imagine running the church without it now.',
                'client_name' => 'Rev. George Agyei Kwabi',
                'client_position' => 'District Minister',
                'client_organization' => 'Presbyterian Church of Ghana, Akosombo',
                'client_image' => null,
                'rating' => 5,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'content' => 'The e-voting solution for our student elections was flawless. DigiBallot provided transparency and instant results, eliminating all disputes. Highly recommended for any institution.',
                'client_name' => 'Prof. Mrs. Theresa Antwi, Ph.D',
                'client_position' => 'Principal',
                'client_organization' => 'St. Louis College of Education',
                'client_image' => null,
                'rating' => 5,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'content' => 'Reliable, professional and always available support. HiCliQs helped us modernize our hospital\'s network infrastructure, significantly improving our service delivery speed.',
                'client_name' => 'Mr. Stephen Tawiah',
                'client_position' => 'Director',
                'client_organization' => 'Metro Health Hospital, Kumasi',
                'client_image' => null,
                'rating' => 4,
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }

        // Company Settings
        $settings = [
            ['key' => 'company_name', 'value' => 'HiCliQs Ghana', 'type' => 'text'],
            ['key' => 'tagline', 'value' => 'Empowering Ghana with Digital Innovation', 'type' => 'text'],
            ['key' => 'about_title', 'value' => 'Decade of Excellence in IT Solutions', 'type' => 'text'],
            ['key' => 'about_description', 'value' => 'With over a decade of experience and more than 150+ successful projects, HiCliQs is a trusted partner in delivering customized IT solutions across Ghana.', 'type' => 'textarea'],
            ['key' => 'years_experience', 'value' => '10', 'type' => 'number'],
            ['key' => 'total_projects', 'value' => '150', 'type' => 'number'],
            ['key' => 'success_rate', 'value' => '98', 'type' => 'number'],
            ['key' => 'phone', 'value' => '0242724849', 'type' => 'text'],
            ['key' => 'email', 'value' => 'info@hicliqs.com', 'type' => 'email'],
            ['key' => 'location', 'value' => 'Kumasi, Ghana', 'type' => 'text'],
            ['key' => 'facebook', 'value' => 'https://web.facebook.com/hicliqsgh', 'type' => 'url'],
            ['key' => 'instagram', 'value' => 'https://www.instagram.com/hicliqsgh/', 'type' => 'url'],
            ['key' => 'tiktok', 'value' => 'https://www.tiktok.com/@hicliqsgh', 'type' => 'url'],
        ];

        foreach ($settings as $setting) {
            CompanySetting::create($setting);
        }
    }
}
