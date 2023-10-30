<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'employee_id' => [
                'integer',
                'exists:employees,id',
                'required',
            ],
            'bar_amount' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'kitchen_amount' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'loss' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'paid_loss' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'bonus' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'percentage' => [
                'required',
                'numeric',
                'between:0,100',
            ],
            'status' => [
                'required',
            ],
            'user_id' => [
                'integer',
                'exists:users,id',
            ],
        ];

    }
}
