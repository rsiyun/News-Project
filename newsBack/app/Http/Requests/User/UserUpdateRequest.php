<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user() != null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'roleId'=>['nullable', 'numeric'],
            'username'=>['nullable', 'unique:users', 'max:12'],
            'profilePicture'=>['nullable', 'image', 'mimes:jpeg,png,jpg'],
            'name'=>['nullable'],
            'email'=>['nullable','unique:users'],
            'password'=>['nullable', 'min:8'],
            'birthDate'=>['nullable']
        ];
    }
}
