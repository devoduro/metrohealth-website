<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicePricingSeeder extends Seeder
{
    public function run(): void
    {
        $servicePricing = [
            'Dreadlock Installation' => [
                'price_short' => 80.00,
                'price_medium' => 120.00,
                'price_long' => 180.00,
                'price_extra_long' => 250.00,
            ],
            'Loc Maintenance' => [
                'price_short' => 40.00,
                'price_medium' => 60.00,
                'price_long' => 85.00,
                'price_extra_long' => 110.00,
            ],
            'Loc Retwist' => [
                'price_short' => 45.00,
                'price_medium' => 65.00,
                'price_long' => 90.00,
                'price_extra_long' => 120.00,
            ],
            'Box Braids' => [
                'price_short' => 60.00,
                'price_medium' => 100.00,
                'price_long' => 150.00,
                'price_extra_long' => 200.00,
            ],
            'Cornrows' => [
                'price_short' => 35.00,
                'price_medium' => 50.00,
                'price_long' => 70.00,
                'price_extra_long' => 95.00,
            ],
            'Hair Treatment' => [
                'price_short' => 30.00,
                'price_medium' => 45.00,
                'price_long' => 60.00,
                'price_extra_long' => 80.00,
            ],
            'Consultation' => [
                'price_short' => 25.00,
                'price_medium' => 25.00,
                'price_long' => 25.00,
                'price_extra_long' => 25.00,
            ],
        ];

        foreach ($servicePricing as $serviceTitle => $prices) {
            Service::where('title', 'LIKE', "%{$serviceTitle}%")
                ->update($prices);
        }
    }
}
