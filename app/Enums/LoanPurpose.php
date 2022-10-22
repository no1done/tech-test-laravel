<?php

namespace App\Enums;

enum LoanPurpose : string {
    case debt_consolidation = "debt_consolidation";
    case car_purchase = "car_purchase";
    case car_other = "car_other";
    case short_term_cash = "short_term_cash";
    case home_improvements = "home_improvements";
    case pay_bills = "pay_bills";
    case one_off_purchase = "one_off_purchase";
    case special_occasion = "special_occasion";
    case other = "other";
}
