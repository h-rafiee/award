<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'mobile' => 'required|string|size:11|regex:/^09[1-9]{9}$/i',
            'code' => [
                'required',
                'alpha_num',
                Rule::exists('event_codes', 'code')->where(function ($query) {
                    $query->where('expires_at', '>', now()->toDateTimeString());
                })
            ],
        ];
    }
}
