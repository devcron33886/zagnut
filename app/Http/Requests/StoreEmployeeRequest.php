<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'names' => 'required|string|max:255',
            'phone_number' => 'required|string|min:10',
            'national_id' => 'required|string|max:16|min:16',
            'sex' => 'required|string',
        ];
    }
}
