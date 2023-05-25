<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'category_id' => 'required|integer',
            'brand_id' => 'required|integer',
            'price' => 'required',
            'qty' => 'required|integer',
            'short_description' => 'required',
            'long_description' => 'required',
            'image' => 'required|image',
            'gallery_image' => 'required|image',
            'type' => 'required|string',
        ];
    }
}
