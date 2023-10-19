<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class editActionInfo extends FormRequest
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
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->id),
            ],
            'phone' => [
                'required',
                'regex:/^\+\d{3} \d{2} \d{3} \d{3}$/',
                Rule::unique('users')->ignore($this->id),
            ],
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
            'email.email' => 'Invalid email format.',
            "email.unique" => trans('messages.emailUnique'),
            "phone.required" => trans('messages.phoneRequired'),
            "phone.unique" =>  trans('messages.phoneUnique'),
            "phone.regex" => trans('messages.phoneRegex'),
        ];
    }
}
