<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class DateAhead implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     * @return void
     * @throws \Exception
     */
    public function __invoke($attribute, $value, $fail)
    {
        $today = new \DateTime();
        $provided = new \DateTime($value);
        if ($provided < $today) {
            $fail('The :attribute must be a future date.');
        }
    }
}
