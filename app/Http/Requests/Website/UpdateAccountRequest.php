<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountRequest extends FormRequest
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
            'code' => 'nullable|min:1|max:30',
            'username' => 'required|min:1|max:30',
            'password' => 'required|min:1|max:30',
            'password' => 'required|min:2|max:100',
            'name' => 'required|min:2|max:30',
            'birthday' => 'nullable',
            'gender' => 'nullable|in:male,female',
            'email' => 'required|email',
            'address' => 'nullable|max:255',
            'phone' => 'required|numeric|regex:/(0)[0-9]{9}/' ,
        ];
    }
}
