<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\CountryConfig;

class CountryConfigSeeder extends Seeder

{
    public function run()
    {
        $configs = [
            [
                'country_code' => 'FR',
                'brand_limit' => 10,
                'is_default' => false,
            ],
            [
                'country_code' => 'DE',
                'brand_limit' => 8,
                'is_default' => false,
            ],
            [
                'country_code' => 'ES',
                'brand_limit' => 12,
                'is_default' => false,
            ],
        ];

        foreach ($configs as $config) {
            CountryConfig::create($config);
        }
    }
}
