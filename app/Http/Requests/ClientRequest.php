<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
                    'email' => 'email|max:255|unique:clients',
                    'genre' => 'required',
                    'civil_state' => 'required',
                    'birthday' => 'required',
                    'address' => 'required',
                    'city' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                        'name' => 'required',
                       // 'email' => 'email|max:255|unique:clients',
                        'birthday' => 'required',
                        'address' => 'required',
                        'genre' => 'required',
                        'civil_state' => 'required',
                        'city' => 'required',
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
