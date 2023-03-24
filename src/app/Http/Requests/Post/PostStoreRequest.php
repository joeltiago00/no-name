<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'text' => ['nullable', 'string'],
            'files' => ['required_without:text', 'array'],
            'files.*' => ['nullable', 'string']
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'text' => [
                'description' => 'Text content of post.',
                'example' => 'This an example of text content.'
            ],
            'files' => [
                'description' => 'Files of post in base64 encode.',
                'example' => 'data:image/png;base64,c2RhYXNkZmFzZGZhc2RmYXNkZmFzZGZhc2RmYXNkZnNkZnNkZnNkZmFzZGZhc2RmYXNm'
            ]
        ];
    }
}
