<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRegisterRequest extends FormRequest
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
            "firstName" => "required|min:3|alpha",
            "lastName" => "required|min:3|alpha",
            "email" => "required|unique:users,email",
            "password" => "required|min:8|confirmed|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",
            "phone" => "required|unique:users,phone|regex:/^\+\d{3}\d{2}\d{3}\d{3}$/",
        ];
    }
    function messages()
    {
        return [
            "firstName.required" => trans('messages.firstName.req'),
            "firstName.min" => trans('messages.firstName.min'),
            "firstName.alpha" => trans('messages.firstName.alpa'),
            "lastName.required" => trans('messages.lastName.req'),
            "lastName.min" => trans('messages.lastName.min'),
            "lastName.alpha" => trans('messages.lastName.alpa'),
            "email.required" => trans('messages.requiredEmail'),
            "email.unique" => trans('messages.emailUnique'),
            "password.required" => trans('messages.requiredPass'),
            "password.min" => trans('messages.passMin'),
            'password.confirmed' => trans('messages.passMatch'),
            "password.regex" => trans('messages.passRegex'),
            "phone.required" => trans('messages.phoneRequired'),
            "phone.unique" => trans('messages.phoneUnique'),
            "phone.regex" => trans('messages.phoneRegex'),
        ];
    }
}
