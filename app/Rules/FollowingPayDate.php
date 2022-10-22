<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;
use Illuminate\Contracts\Validation\DataAwareRule;

class FollowingPayDate implements DataAwareRule, InvokableRule
{
    /**
     * All of the data under validation.
     *
     * @var array
     */
    protected array $data = [];

    /**
     * Set the data under validation.
     *
     * @param  array  $data
     * @return $this
     */
    public function setData($data): static
    {
        $this->data = $data;

        return $this;
    }

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
        $nextPayDate = new \DateTime($this->data['next_pay_date']);

        // Must be within 45 days of next pay date
        $diff = $nextPayDate->diff(new \DateTime($value));

        if ($diff->days < 1 || $diff->days > 45) {
            $fail('The :attribute must be within 45 days of next pay date.');
        }
    }
}
