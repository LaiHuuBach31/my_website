<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Hash;

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
        $auth = Auth::user();

        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$auth->id,  
            'password' => [
                'required',
                function($attribute, $value, $fail) use($auth) {
                    if (!Hash::check($value, $auth->password)) {
                        $fail('The password you entered is incorrect');
                    }
                }
            ],
        ];
    }
}
