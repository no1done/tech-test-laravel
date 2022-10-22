<?php

namespace App\Enums;

enum PaymentMethod : string
{
    case uk_direct_deposit = "UK Direct Deposit";
    case non_uk_direct_deposit = "Non-UK Direct Deposit";
    case cash = "Case";
    case cheque = "Cheque";
    case none = "None";
}
