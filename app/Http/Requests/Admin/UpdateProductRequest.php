<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required|min:1|max:30',
            'name' => 'required|min:1|max:60',
            'detail' => 'nullable',
            'price' => 'required|numeric',
            'image' => 'nullable',
            'price_new' => 'nullable|numeric',
            'quantity' => 'required',
            'warranty' => 'required|numeric',
            'color' => 'nullable',
            'brand_id' => 'required|numeric',
            'catagory_id' => 'required|numeric',
            'feature' => 'nullable',
            'use' => 'nullable',
            'status' => 'nullable',
            'year' => 'required|numeric',
        ];
    }
}
