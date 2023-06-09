<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email:rfc,filter', 'exists:users'],
            'password' => ['required', 'string', 'min:8', 'max:64']
        ];
    }

    public function bodyParams(): array
    {
        return [
            'email' => [
                'description' => 'User email to make login.',
                'example' => 'john@week.com'
            ],
            'password' => [
                'description' => 'User password.',
                'example' => '@password123'
            ]
        ];
    }
}
