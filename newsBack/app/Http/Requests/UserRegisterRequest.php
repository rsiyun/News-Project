<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'roleId'=>['required', 'numeric'],
            'username'=>['required', 'unique:users', 'max:12'],
            'name'=>['required'],
            'email'=>['required','unique:users'],
            'password'=>['required'],
            'birthDate'=>['required']
        ];
    }
}
