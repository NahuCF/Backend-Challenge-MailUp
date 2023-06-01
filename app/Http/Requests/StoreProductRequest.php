<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'required',
            'brand' => 'required|max:255',
            'price' => 'required|numeric',
            'price_sale' => 'required|numeric',
            'category' => 'required|max:255',
            'stock' => 'required|numeric',
        ];
    }
}
