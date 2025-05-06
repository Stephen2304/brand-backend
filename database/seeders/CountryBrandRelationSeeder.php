<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CountryBrandRelation;

class CountryBrandRelationSeeder extends Seeder
{
    public function run()
    {
        $relations = [
            [
                'country_code' => 'FR',
                'brand_id' => 1,
                'position' => 1,
            ],
            [
                'country_code' => 'FR',
                'brand_id' => 2,
                'position' => 2,
            ],
            [
                'country_code' => 'DE',
                'brand_id' => 1,
                'position' => 1,
            ],
        ];

        foreach ($relations as $relation) {
            CountryBrandRelation::create($relation);
        }
    }
}
