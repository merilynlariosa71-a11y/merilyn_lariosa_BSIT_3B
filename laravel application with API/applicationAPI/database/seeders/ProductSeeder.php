<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Classic Leather Messenger',
                'category' => 'Messenger Bags',
                'description' => 'A timeless leather messenger bag designed for work, travel, and everyday elegance.',
                'price' => 15999,
                'image' => 'https://images.unsplash.com/photo-1547949003-9792a18a2601?w=800',
                'rating' => 4.9,
                'reviews' => 245,
                'colors' => ['Cognac', 'Black', 'Oxblood'],
                'sizes' => ['Small', 'Medium', 'Large'],
            ],
            [
                'name' => 'Urban Explorer Backpack',
                'category' => 'Backpacks',
                'description' => 'Modern leather backpack with premium compartments and comfortable everyday carry.',
                'price' => 6500,
                'image' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=800',
                'rating' => 4.8,
                'reviews' => 310,
                'colors' => ['Black', 'Brown', 'Sage'],
                'sizes' => ['Standard'],
            ],
            [
                'name' => 'Evening Clutch Collection',
                'category' => 'Clutches',
                'description' => 'Elegant clutch bag perfect for events, dinners, and formal occasions.',
                'price' => 6499,
                'image' => 'https://images.unsplash.com/photo-1594223274512-ad4803739b7c?w=800',
                'rating' => 4.7,
                'reviews' => 180,
                'colors' => ['Black', 'Terracotta', 'Oxblood'],
                'sizes' => ['One Size'],
            ],
            [
                'name' => 'Premium Tote Bag',
                'category' => 'Totes',
                'description' => 'Spacious and stylish tote bag crafted for shopping, office, and lifestyle use.',
                'price' => 8999,
                'image' => 'https://images.unsplash.com/photo-1590874103328-eac38a683ce7?w=800',
                'rating' => 4.6,
                'reviews' => 126,
                'colors' => ['Cognac', 'Black', 'Brown'],
                'sizes' => ['Medium', 'Large'],
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(['name' => $product['name']], $product);
        }
    }
}