<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryConfig extends Model
{
    protected $table = 'country_configs';

    protected $fillable = [
        'country_code',
        'brand_limit',
        'is_default',
    ];
}
