<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePurchaseRequest extends FormRequest
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
            'purchase_category' => 'required',
            'purchase_type' => 'required',
            'purchase' => 'required',
            'dept' => 'required',
            'status' => 'required',
            'allocated_budget_php' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'purchase_category' => 'purchase group',
            'purchase_type' => 'purchase type',
            'dept' => 'dept.',
            'purchase' => 'purchase info',
        ];
    }

    public function validated($key = null, $default = null)
    {
        $validated = parent::validated($key, $default);

        return array_merge($validated, [
            'purchase_category_id' => $this->purchase_category,
            'purchase_type_id' => $this->purchase_type,
            'dept_id' => $this->dept,
            'status_id' => $this->status,
            'description' => $this->purchase,
        ]);
    }
}
