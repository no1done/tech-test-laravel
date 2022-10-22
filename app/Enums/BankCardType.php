<?php

namespace App\Enums;

enum BankCardType : string
{
    case solo = "solo";
    case switch_maestro = "switch_maestro";
    case visa = "visa";
    case visa_debit = "visa_debit";
    case visa_delta = "visa_delta";
    case visa_electron = "visa_electron";
    case mastercard = "mastercard";
    case mastercard_debit = "mastercard_debit";
}
