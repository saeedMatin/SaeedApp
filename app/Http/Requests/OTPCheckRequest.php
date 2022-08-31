<?php

namespace App\Http\Requests;

use App\Rules\checkotp;
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
        $response
            = [
                'CodeNumber' => ['required', 'digits:5', 'numeric', new checkotp]
            ];

        return $response;
    }
}
