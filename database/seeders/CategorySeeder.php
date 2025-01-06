<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            'https://bd-live-21.slatic.net/kf/S3f348d59bae949d4b16b27bed10c5e16g.jpg',
            'https://static-01.daraz.com.bd/p/8ae08d7667dd1c81043d70d62892da5b.jpg',
            'https://static-01.daraz.com.bd/p/6ef5f957504c6b4c9261b3e9c01dfc81.jpg',
            'https://static-01.daraz.com.bd/p/6ef5f957504c6b4c9261b3e9c01dfc81.jpg',
        ];
        $categories = [
                'Electronic Devices',
                'TV & Home Appliances',
                'Health & Beauty',
                'Babies & Toys',
                'Groceries & Pets',
                'Home & Lifestyle',
                'Womens Fashion',
                'Mens Fashion',
                'Watches & Accessories',
                'Sports & Outdoor',
                'Automotive & Motorbike',
        ];

        foreach ($categories as $key=>$value) {
            Category::create([
                'name' => $value,
                'slug' => Str::slug($value, '-'),
                'image' =>$images[rand(0,3)],
                'status' => rand(0,1),
            ]);
        }
    }
}
