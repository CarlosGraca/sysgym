<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SecureComparticipationRequest extends FormRequest
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
            'secure_agency_id'=>'required',
            'procedure_id'=>'required',
            'code'=>'required',
            'max_value'=>'required',
            'deadline'=>'required',
            'max_frequency'=>'required',
        ];
    }
}
