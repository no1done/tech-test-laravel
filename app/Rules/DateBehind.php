<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class DateBehind implements InvokableRule
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
        $today = new \DateTime();
        $provided = new \DateTime($value);
        $value = $provided->format('d-m-Y');
        if ($provided > $today) {
            $fail('The :attribute must be a past date.');
        }
    }
}
