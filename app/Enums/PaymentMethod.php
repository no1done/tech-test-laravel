<?php

namespace App\Enums;

enum PaymentMethod : string
{
    case uk_direct_deposit = "uk_direct_deposit";
    case non_uk_direct_deposit = "non_uk_direct_deposit";
    case cash = "cash";
    case cheque = "cheque";
    case none = "none";
}
