<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                    'name' => 'required|unique:category',
                    'salary_base'=>'required'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'required',
                    'salary_base'=>'required'
                ];
                /*  return [
                      'user.name.first' => 'required',
                      'user.name.last'  => 'required',
                      'user.email'      => 'required|email|unique:users,email,'.$user->id,
                      'user.password'   => 'required|confirmed',
                  ];*/
            }
            default:break;
        }
    }
}
