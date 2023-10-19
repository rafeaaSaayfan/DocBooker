<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class picturesRequest extends FormRequest
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
            'homePhoto' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'ourDocPhoto' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'clinic1' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'clinic2' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'clinic3' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'homePhoto.image' => trans('messages.homeImg'),
            'homePhoto.mimes' => trans('messages.mimes'),
            'homePhoto.max' => trans('messages.max'),
            'ourDocPhoto.image' => trans('messages.ourDocImg'),
            'ourDocPhoto.mimes' => trans('messages.mimes'),
            'ourDocPhoto.max' => trans('messages.max'),
            'clinic1.image' => trans('messages.clinicImg'),
            'clinic1.mimes' => trans('messages.mimes'),
            'clinic1.max' => trans('messages.max'),
            'clinic2.image' => trans('messages.clinicImg'),
            'clinic2.mimes' => trans('messages.mimes'),
            'clinic2.max' => trans('messages.max'),
            'clinic3.image' => trans('messages.clinicImg'),
            'clinic3.mimes' => trans('messages.mimes'),
            'clinic3.max' => trans('messages.max'),
        ];
    }
}
