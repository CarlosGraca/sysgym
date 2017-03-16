<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'name' => 'required',
                    'email' => 'email|max:255|unique:employees',
                    'birthday' => 'required',
                    'address' => 'required',
                    'genre' => 'required',
                    'civil_state' => 'required',
                    'city' => 'required',
                    'branch'=>'required',
                    'island_id' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'required',
                    // 'email' => 'email|max:255|unique:patients',
                    'birthday' => 'required',
                    'address' => 'required',
                    'genre' => 'required',
                    'civil_state' => 'required',
                    'city' => 'required',
                    'island_id' => 'required',
                    'branch'=>'required',
                ];
            }
            default:break;
        }
    }
}
