<?php

namespace App\Enums;

enum BankCardType : string
{
    case solo = "Solo";
    case switch_maestro = "Switch Maestro";
    case visa = "Visa";
    case visa_debit = "Visa Debit";
    case visa_delta = "Visa Delta";
    case visa_electron = "Visa Electron";
    case mastercard = "Mastercard";
    case mastercard_debit = "Mastercard Debit";
}
