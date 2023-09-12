<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TenDigitPhoneNumber implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Remove any non-numeric characters from the phone number
        $numericValue = preg_replace('/[^0-9]/', '', $value);

        // Check if the numeric phone number is exactly 10 digits long
        return strlen($numericValue) === 10;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The phone number must be 10 digits long.';
    }
}
