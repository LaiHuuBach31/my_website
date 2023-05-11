<?php

namespace App\Http\Requests\Attribute;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'value' => 'required|unique:attributes,value,'.$this->id,
            'description' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'value.required' => 'The attribute value is required.',
            'value.unique' => 'The attribute value already exists in the database.',
            'description.required' => 'The attribute description is required.',
        ];
    }
}
