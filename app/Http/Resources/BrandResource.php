<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'brand_name'    => $this->brand_name,
            'rating'        => $this->rating,
            'country_codes' => $this->country_codes ?? [],
        ];
    }
}
