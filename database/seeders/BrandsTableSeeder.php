<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $brands = [
            [
                'brand_name' => 'Royal Vegas',
                'brand_image' => 'https://placehold.co/100x100',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_name' => 'JackpotCity',
                'brand_image' => 'https://placehold.co/100x100',
                'rating' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_name' => 'Spin Casino',
                'brand_image' => 'https://placehold.co/100x100',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_name' => 'Lucky Days',
                'brand_image' => 'https://placehold.co/100x100',
                'rating' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_name' => 'Casino Tropez',
                'brand_image' => 'https://placehold.co/100x100',
                'rating' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_name' => 'Betway',
                'brand_image' => 'https://placehold.co/100x100',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_name' => 'Leo Vegas',
                'brand_image' => 'https://placehold.co/100x100',
                'rating' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_name' => 'Casumo',
                'brand_image' => 'https://placehold.co/100x100',
                'rating' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_name' => 'WinaPalace',
                'brand_image' => 'https://placehold.co/100x100',
                'rating' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_name' => 'Casino777',
                'brand_image' => 'https://placehold.co/100x100',
                'rating' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_name' => 'Winamax',
                'brand_image' => 'https://placehold.co/100x100',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_name' => 'Unibet',
                'brand_image' => 'https://placehold.co/100x100',
                'rating' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_name' => 'Bwin',
                'brand_image' => 'https://placehold.co/100x100',
                'rating' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_name' => 'PokerStars',
                'brand_image' => 'https://placehold.co/100x100',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_name' => 'PMU',
                'brand_image' => 'https://placehold.co/100x100',
                'rating' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('brands')->insert($brands);
    }
}