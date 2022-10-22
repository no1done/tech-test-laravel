<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class OverEighteen implements InvokableRule
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
        $bday = clone $provided;
        $bday->add(new \DateInterval("P18Y"));
        if ($bday > $today) {
            $fail('The :attribute must be over 18 years of age.');
        }
    }
}
