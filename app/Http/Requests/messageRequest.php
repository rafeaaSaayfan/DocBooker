<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class messageRequest extends FormRequest
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
            'message' => 'required|max:100|min:5',
        ];
    }
    public function messages()
    {
        return [
            'message.required' => trans('messages.messRequird'),
            'message.max' => trans('messages.messMax'),
            'message.min' => trans('messages.messMin'),
        ];
    }
}
