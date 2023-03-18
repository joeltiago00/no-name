<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'min:3', 'max:30'],
            'last_name' => ['nullable', 'string', 'min:3', 'max:80'],
            'email' => ['required', 'email:rfc,filter', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'max:64'],
            'birth_date' => ['required', 'date', 'date_format:Y-m-d'],
            'gender' => ['required', 'string', 'in:f,m']
        ];
    }

    public function bodyParameters()
    {
        return [
            'first_name' => [
                'description' => 'User first name.',
                'example' => 'John'
            ],
            'last_name' => [
                'description' => 'User last name.',
                'example' => 'Week'
            ],
            'email' => [
                'description' => 'User email to receive notifications and make login.',
                'example' => 'john@week.com'
            ],
            'password' => [
                'description' => 'User password to make login.',
                'example' => '@Password123'
            ],
            'birth_date' => [
                'description' => 'User birth date.',
                'example' => '1997-01-28'
            ],
            'gender' => [
                'description' => 'User gender. [f = female, m = male]',
                'example' => 'm'
            ]
        ];
    }
}
