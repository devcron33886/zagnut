<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class RwandanPhoneNumber implements Rule
{
    public function passes($attribute, $value)
    {
        // Remove any non-numeric characters from the input.
        $value = preg_replace('/\D/', '', $value);

        // Check if the number starts with +250 and is followed by 9 digits.
        return preg_match('/^\\+250\D{9}$/', $value);
    }

    public function message()
    {
        return 'The :attribute must be a valid Rwandan mobile number (e.g., +250780000000).';
    }
}
