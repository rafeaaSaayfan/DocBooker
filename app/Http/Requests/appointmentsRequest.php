<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class appointmentsRequest extends FormRequest
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
            'start_date' => 'required|date|unique:appointments,start_date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
        ];
    }
    public function messages(): array
    {
        return [
            'start_date.required' => trans('messages.requirStartDate'),
            'start_date.date' => trans('messages.validDate'),
            'start_date.unique' => trans('messages.uniqueDate'),

            'start_time.required' => trans('messages.requirStartDate'),
            'end_time.required' => trans('messages.requirStartDate'),
        ];
    }
}
