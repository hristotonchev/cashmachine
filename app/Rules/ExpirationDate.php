<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * @ExpirationDate
 * @package App\Rule
 *
 * Custom Validation rule for credit card source form expiration date
 */
class ExpirationDate implements Rule
{
    /** @var int maximum months in year*/
    const MAX_MONTHS_PER_YEAR = 12;

    /** @var int minimum months per year */
    const MIN_MONTHS_PER_YEAR = 1;

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
        if (!preg_match('/^([0-9]{2})\/([0-9]{4}$)/', $value)) {
            return false;
        }

        $validYear = date('Y');
        $validMonth = date('m', strtotime(' + 2 months'));

        $expDate = explode('/', $value);

        if ($expDate[0] < self::MIN_MONTHS_PER_YEAR || $expDate[0] > self::MAX_MONTHS_PER_YEAR) {
            return false;
        }

        if($expDate[1] > $validYear) {
            return true;
        }

        if ($expDate[0] > $validMonth) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Invalid date format';
    }
}
