<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            // 'sku' => 'required|string|max:255|unique:products,sku',
            'quantity' => 'required|integer|min:0',
            'status' => 'required|in:1,0',
            'branch_id' => 'required|exists:branches,id'
        ];
    }

public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price must be a number.',
            'price.min' => 'The price must be a positive value.',
            'quantity.required' => 'The quantity field is required.',
            'quantity.integer' => 'The quantity must be an integer.',
            'quantity.min' => 'The quantity must be a positive value.',
            'status.required' => 'The status field is required.',
            'status.in' => 'The selected status is invalid.',
            'branch_id.required' => 'The branch field is required.',
            'branch_id.exists' => 'The selected branch is invalid.'
        ];
    }
}
