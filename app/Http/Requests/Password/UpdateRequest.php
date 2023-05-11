<?php

namespace App\Http\Requests\Password;

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
            'old_password' => [
                'required',
                function($attribute, $value, $fail) use($auth) {
                    if (!Hash::check($value, $auth->password)) {
                        $fail('Mật khẩu bạn nhập không chính xác');
                    }
                }
            ],
            'new_password' => 'required|different:old_password',
            'confirm_new_password' => 'required|same:new_password'
        ];
    }
}
