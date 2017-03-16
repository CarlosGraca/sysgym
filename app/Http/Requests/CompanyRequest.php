<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'nif' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'zip_code' => 'required',
            'city' => 'required',
            'area' => 'required',
            'owner' => 'required',
            'island' => 'required',
        ];
    }
}
