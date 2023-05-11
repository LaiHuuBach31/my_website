<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0|lte:price',
            'upload' => 'required|mimes:jpeg,jpg,png,gif',            
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'The product name field is required.',
            'price.required' => 'The product price field is required.',
            'price.numeric' => 'The product price field must be a number.',
            'price.min' => 'The product price must be greater than or equal to 0.',
            'discount.numeric' => 'The product discount field must be a number.',
            'discount.min' => 'The product discount is greater than or equal to 0',
            'discount.lte' => 'The product discount must be less than or equal to the product price.',
            'upload.required' => 'The product avatar field is required.',
            'upload.mimes' => 'The selected file must be a JPEG, JPG, PNG, or GIF image.',
            
            
        ];
    }
}
