<?php

namespace App\Http\Controllers;

use App\Models\CountryConfig;

class CountryConfigController extends Controller
{
    /**
     * Affiche la liste de toutes les configurations de pays.
     */
    public function index()
    {
        $configs = CountryConfig::all();
        return response()->success($configs, __('Country Configs charged successfully'), 200);
    }
}
