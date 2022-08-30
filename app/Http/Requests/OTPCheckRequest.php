<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OTPCheckRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // 'PhoneNumber' => ['required', 'digits:11', 'numeric', 'regex:/^09(0[0-5]{1}|1[0-9]{1}|2[0-2]{1}|3(0|[3-9]{1})|98|99)\d{7}$/'],
            'CodeNumber' => ['required', 'digits:5', 'numeric']
        ];
    }
}
