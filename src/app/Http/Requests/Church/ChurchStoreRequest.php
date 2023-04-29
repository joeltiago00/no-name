<?php

namespace App\Http\Requests\Church;

use Illuminate\Foundation\Http\FormRequest;

class ChurchStoreRequest extends FormRequest
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
            'church_type_id' => ['required', 'integer', 'exists:church_types,id'],
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'leader_id' => ['nullable', 'integer', 'exists:users,id'],
            'street' => ['required', 'string', 'min:3', 'max:80'],
            'number' => ['required', 'string', 'min:1', 'max:15'],
            'neighborhood' => ['required', 'string', 'min:3', 'max:80'],
            'city' => ['required', 'string', 'min:3', 'max:80'],
            'state' => ['required', 'string', 'min:2'],
            'country' => ['required', 'string', 'min:3', 'max:40'],
            'zipcode' => ['required', 'string'],
            'complement' => ['nullable', 'string', 'min:3']
        ];
    }
}
