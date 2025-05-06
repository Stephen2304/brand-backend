<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BrandRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            return [
                'brand_name'     => ['sometimes', 'required', 'string', 'max:255'],
                'brand_image'    => ['sometimes', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
                'rating'         => ['sometimes', 'required', 'integer', 'min:1', 'max:5'],
                'country_codes'  => ['sometimes', 'array'],
                'country_codes.*'=> ['string', 'size:2'],
                'positions'      => ['sometimes', 'array'],
                'positions.*'    => ['integer'],
            ];
        }

        return [
            'brand_name'     => ['required', 'string', 'max:255'],
            'brand_image'    => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'rating'         => ['required', 'integer', 'min:1', 'max:5'],
            'country_codes'  => ['required', 'array'],
            'country_codes.*'=> ['string', 'size:2'],
            'positions'      => ['array'],
            'positions.*'    => ['integer'],
        ];
    }
}
