<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class PhoneNumber implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        if (strlen($value) !== 11 || str_starts_with($value, '07')) {
            $fail('The :attribute must be 11 numbers long and not start with 07');
        }
    }
}
