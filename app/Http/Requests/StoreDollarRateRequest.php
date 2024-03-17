<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDollarRateRequest extends FormRequest
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
            'rate' => ['required', 'regex:/^(([0-9]*)(\.([0-9]{0,2}+))?)$/'],
        ];
    }

    public function attributes()
    {
        return [
            'rate' => 'peso rate',
        ];
    }
}
