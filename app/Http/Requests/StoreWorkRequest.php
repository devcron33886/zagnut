<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'employee_id' => 'required|exists:employees,id',
            'bar_amount' => 'required|integer',
            'kitchen_amount' => 'required|integer',
            'chamber_amount' => 'required|integer',
            'bingalo_amount' => 'required|integer',
            'cash_in' => 'integer',
            'cash_out' => 'integer',
            'user_id' => 'required|exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'employee_id.required' => 'Employee required.',
            'employee_id.exists' => 'selected employee invalid.',
            'bar_amount.required' => 'Bar amount required.',
            'kitchen_amount.required' => 'Kitchen amount required.',
            'chamber_amount.required' => 'Chamber amount required.',
            'bingalo_amount.required' => 'Bingalo amount required.',
            'cash_in.integer' => 'Cash in must be an integer.',
            'cash_out.integer' => 'Cash out must be an integer.',
            'user_id.required' => 'User required.',
            'user_id.exists' => 'selected user invalid.',
        ];
    }
}
