<?php

namespace App\Models;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Model;

class CountryBrandRelation extends Model
{
    protected $table = 'country_brand_relations';

    protected $fillable = [
        'country_code',
        'brand_id',
        'position',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
