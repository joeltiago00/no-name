<?php

namespace App\Http\Requests\Church;

use Illuminate\Foundation\Http\FormRequest;

class ChurchUpdateRequest extends FormRequest
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
            'church_type_id' => ['nullable', 'integer', 'exists:church_types,id'],
            'name' => ['nullable', 'string', 'min:3', 'max:100'],
            'leader_id' => ['nullable', 'integer', 'exists:users,id'],
            'street' => ['nullable', 'string', 'min:3', 'max:80'],
            'number' => ['nullable', 'string', 'min:1', 'max:15'],
            'neighborhood' => ['nullable', 'string', 'min:3', 'max:80'],
            'city' => ['nullable', 'string', 'min:3', 'max:80'],
            'state' => ['nullable', 'string', 'min:2'],
            'country' => ['nullable', 'string', 'min:3', 'max:40'],
            'zipcode' => ['nullable', 'string'],
            'complement' => ['nullable', 'string', 'min:3']
        ];
    }
}
