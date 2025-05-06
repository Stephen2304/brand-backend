<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\CountryConfig;
use App\Models\CountryBrandRelation;
use App\Http\Requests\Auth\BrandRequest;
use Illuminate\Support\Str;
use App\Http\Resources\BrandResource;

class BrandController extends Controller
{
    /**
     *  Afficher toutes les marques
     **/ 
    public function index(Request $request)
    {
        $countryCode = $request->attributes->get('country_code');

        $config = CountryConfig::where('country_code', $countryCode)->first();

        if (!$config) {
            $brands = Brand::orderBy('rating', 'desc')->get();

            $brands = $brands->map(function($brand) {
                $countryCodes = CountryBrandRelation::where('brand_id', $brand->id)->pluck('country_code');
                $brand->country_codes = $countryCodes;
                return $brand;
            });

            return response()->success(BrandResource::collection($brands),__('Defaut Brands charged successfully'),200);
        }

        $relations = CountryBrandRelation::where('country_code', $config->country_code)
            ->orderBy('position')
            ->limit($config->brand_limit)
            ->get();

        $brandIds = $relations->pluck('brand_id');
        $brands = Brand::whereIn('id', $brandIds)->get();

        $brands = $brands->sortBy(function($brand) use ($relations) {
            return $relations->where('brand_id', $brand->id)->first()->position ?? 0;
        })->values();

        $brands = $brands->map(function($brand) {
            $countryCodes = CountryBrandRelation::where('brand_id', $brand->id)->pluck('country_code');
            $brand->country_codes = $countryCodes;
            return $brand;
        });

        return response()->success(BrandResource::collection($brands),__('Brands base on countryCode charged successfully'),200);
    }

    /**
     *  Créer une nouvelle marque
     */
    public function store(BrandRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('brand_image')) {
            $image = $request->file('brand_image');
            $extension = $image->getClientOriginalExtension();
            $fileName = $validated['brand_name'] . '.' . $extension;
            $path = $image->storeAs('brands', $fileName, 'public');
            $validated['brand_image'] = 'storage/' . $path;
        }

        $brand = Brand::create($validated);

        foreach ($validated['country_codes'] as $index => $countryCode) {
            CountryBrandRelation::create([
                'country_code' => $countryCode,
                'brand_id' => $brand->id,
                'position' => $validated['positions'][$index] ?? 0,
            ]);
        }

        return response()->success(New BrandResource($brand), __('Brands created successfully'), 200);
    }

    /**
     *  Afficher une marque spécifique
     */
    public function show($id)
    {
        $brand = Brand::findOrFail($id);
        return response()->json($brand);
    }

    /**
     *  Mettre à jour une marque
     */
    public function update(BrandRequest $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('brand_image')) {
            $image = $request->file('brand_image');
            $extension = $image->getClientOriginalExtension();
            $fileName = $validated['brand_name'] . '.' . $extension;
            $path = $image->storeAs('brands', $fileName, 'public');
            $validated['brand_image'] = 'storage/' . $path;
        }

        $brand->update($validated);

        if (isset($validated['country_codes'])) {
            CountryBrandRelation::where('brand_id', $brand->id)->delete();

            foreach ($validated['country_codes'] as $index => $countryCode) {
                CountryBrandRelation::create([
                    'country_code' => $countryCode,
                    'brand_id' => $brand->id,
                    'position' => $validated['positions'][$index] ?? 0,
                ]);
            }
        }

        $brand->refresh();

        $brand->country_codes = CountryBrandRelation::where('brand_id', $brand->id)->pluck('country_code');

        return response()->success(New BrandResource($brand), __('Brands updated successfully'), 200);
    }

    /**
     *  Supprimer une marque
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return response()->success([], __('Brands deleted successfully'), 200);
    }
}
