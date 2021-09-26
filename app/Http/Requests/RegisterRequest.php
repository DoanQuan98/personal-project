<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email',
            'avatar' => 'required',
            'password' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name cannot be left blank',
            'email.required' => 'Email cannot be left blank',
            'avatar' => 'Avatar cannot be left blank',
            'email.email' => 'Incorrect email format',
            'password.required' => 'Password cannot be left blank',
            'address.required' => 'The address cannot be left blank',
            'phone.required' => 'Phone number cannot be left blank',
        ];
    }
}
