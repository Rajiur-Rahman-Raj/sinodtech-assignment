<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreSaleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'branch_id' => ['required', 'exists:branches,id'],

            'customer_id' => ['required', 'exists:customers,id'],

            'sale_date' => ['required', 'date'],

            'products' => ['required', 'array', 'min:1'],

            'products.*.product_id' => [
                'required',
                'exists:products,id'
            ],

            'products.*.quantity' => [
                'required',
                'integer',
                'min:1'
            ],

        ];
    }
}
