<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * @TransferDate
 * @package App\Rule
 *
 * Custom Validation rule for bank transfer source form
 *
 */
class TransferDate implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        if (date('Y-m-d') > $value) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Transfer Date can’t be older than current date';
    }
}
