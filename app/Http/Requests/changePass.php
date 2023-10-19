<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class changePass extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'current_password' => 'required',
            'new_password' => "required|min:8|confirmed|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",
        ];
    }

    public function messages()
    {
        return [
            'current_password.required' => trans('messages.currPassReq'),
            'new_password.required' => trans('messages.newPassReq'),
            "new_password.min" => trans('messages.passMin'),
            'new_password.confirmed' => trans('messages.passMatch'),
            "new_password.regex" => trans('messages.passRegex'),
        ];
    }
}
