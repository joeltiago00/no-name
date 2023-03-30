<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostListRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'page' => ['nullable', 'integer', 'min:1'],
            'per_page' => ['nullable', 'integer', 'min:5'],
            'text' => ['nullable', 'string'],
            'user_id' => ['nullable', 'int', 'exists:users,id']
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'page' => [
                'description' => 'Current list page.',
                'example' => 1,
            ],
            'per_page' => [
                'description' => 'Quantity of posts per page.',
                'example' => 10
            ],
            'text' => [
                'description' => 'Filter to search post by text.',
                'example' => 'This a text example.'
            ],
            'user_id' => [
                'description' => 'Filter posts by user.',
                'example' => 1
            ]
        ];
    }
}
