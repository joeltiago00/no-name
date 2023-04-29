<?php

namespace App\Http\Requests\Church;

use Illuminate\Foundation\Http\FormRequest;

class ChurchIndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'page' => ['nullable', 'integer'],
            'per_page' => ['nullable', 'integer'],
            'name' => ['nullable', 'string', 'max:30']
        ];
    }
}
