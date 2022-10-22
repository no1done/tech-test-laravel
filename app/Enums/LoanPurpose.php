<?php

namespace App\Enums;

enum LoanPurpose : string {
    case debt_consolidation = "Debt Consolidation";
    case car_purchase = "Car Purchase";
    case car_other = "Car - Other";
    case short_term_cash = "Short Term Cash";
    case home_improvements = "Home Improvements";
    case pay_bills = "Pay Bills";
    case one_off_purchase = "One Off Purchase";
    case special_occasion = "Special Occasion";
    case other = "Other";
}
