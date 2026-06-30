<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Loc Retwist Cream',
                'slug' => 'loc-retwist-cream',
                'description' => 'Premium loc retwist cream for maintaining healthy, well-defined locs. Provides strong hold without buildup.',
                'price' => 24.99,
                'image' => 'images/products/loc-cream.jpg',
                'category' => 'Hair Care',
                'stock' => 50,
                'icon' => 'fas fa-spray-can',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Natural Hair Oil',
                'slug' => 'natural-hair-oil',
                'description' => 'Nourishing blend of natural oils to promote hair growth and maintain scalp health. Perfect for all hair types.',
                'price' => 18.99,
                'image' => 'images/products/hair-oil.jpg',
                'category' => 'Hair Care',
                'stock' => 75,
                'icon' => 'fas fa-oil-can',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Edge Control Gel',
                'slug' => 'edge-control-gel',
                'description' => 'Strong hold edge control gel for sleek, polished styles. Non-flaking formula that lasts all day.',
                'price' => 12.99,
                'image' => 'images/products/edge-control.jpg',
                'category' => 'Styling',
                'stock' => 60,
                'icon' => 'fas fa-hand-sparkles',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Moisturizing Shampoo',
                'slug' => 'moisturizing-shampoo',
                'description' => 'Gentle, sulfate-free shampoo that cleanses without stripping natural oils. Ideal for textured hair.',
                'price' => 16.99,
                'image' => 'images/products/shampoo.jpg',
                'category' => 'Hair Care',
                'stock' => 40,
                'icon' => 'fas fa-pump-soap',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Deep Conditioning Mask',
                'slug' => 'deep-conditioning-mask',
                'description' => 'Intensive deep conditioning treatment for damaged or dry hair. Restores moisture and shine.',
                'price' => 22.99,
                'image' => 'images/products/conditioner.jpg',
                'category' => 'Hair Care',
                'stock' => 35,
                'icon' => 'fas fa-spa',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Braid Spray',
                'slug' => 'braid-spray',
                'description' => 'Refreshing braid spray to keep braids moisturized and smelling fresh. Reduces itching and flaking.',
                'price' => 14.99,
                'image' => 'images/products/braid-spray.jpg',
                'category' => 'Styling',
                'stock' => 55,
                'icon' => 'fas fa-spray-can',
                'order' => 6,
                'is_active' => true,
            ],
            [
                'name' => 'Loc Starter Kit',
                'slug' => 'loc-starter-kit',
                'description' => 'Complete starter kit for beginning your loc journey. Includes shampoo, oil and retwist cream.',
                'price' => 49.99,
                'image' => 'images/products/starter-kit.jpg',
                'category' => 'Kits',
                'stock' => 20,
                'icon' => 'fas fa-box',
                'order' => 7,
                'is_active' => true,
            ],
            [
                'name' => 'Silk Bonnet',
                'slug' => 'silk-bonnet',
                'description' => 'Premium silk bonnet to protect your hair while you sleep. Reduces frizz and breakage.',
                'price' => 9.99,
                'image' => 'images/products/bonnet.jpg',
                'category' => 'Accessories',
                'stock' => 100,
                'icon' => 'fas fa-hat-cowboy',
                'order' => 8,
                'is_active' => true,
            ],
            [
                'name' => 'Wide Tooth Comb',
                'slug' => 'wide-tooth-comb',
                'description' => 'Gentle wide tooth comb for detangling natural hair without breakage. Essential for hair care.',
                'price' => 7.99,
                'image' => 'images/products/comb.jpg',
                'category' => 'Accessories',
                'stock' => 80,
                'icon' => 'fas fa-comb',
                'order' => 9,
                'is_active' => true,
            ],
            [
                'name' => 'Loc Jewelry Set',
                'slug' => 'loc-jewelry-set',
                'description' => 'Beautiful set of loc jewelry to accessorize your locs. Includes rings, cuffs and beads.',
                'price' => 19.99,
                'image' => 'images/products/jewelry.jpg',
                'category' => 'Accessories',
                'stock' => 45,
                'icon' => 'fas fa-gem',
                'order' => 10,
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['slug' => $product['slug']],
                $product
            );
        }
    }
}
