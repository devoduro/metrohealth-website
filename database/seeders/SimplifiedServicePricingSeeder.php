<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class SimplifiedServicePricingSeeder extends Seeder
{
    public function run(): void
    {
        $servicePricing = [
            'Dreadlock Installation' => [
                'price_min' => 80.00,
                'price_max' => 250.00,
            ],
            'Loc Maintenance' => [
                'price_min' => 40.00,
                'price_max' => 110.00,
            ],
            'Loc Retwist' => [
                'price_min' => 45.00,
                'price_max' => 120.00,
            ],
            'Box Braids' => [
                'price_min' => 60.00,
                'price_max' => 200.00,
            ],
            'Cornrows' => [
                'price_min' => 35.00,
                'price_max' => 95.00,
            ],
            'Hair Treatment' => [
                'price_min' => 30.00,
                'price_max' => 80.00,
            ],
            'Consultation' => [
                'price_min' => 25.00,
                'price_max' => 25.00,
            ],
        ];

        foreach ($servicePricing as $serviceTitle => $prices) {
            Service::where('title', 'LIKE', "%{$serviceTitle}%")
                ->update($prices);
        }
    }
}
