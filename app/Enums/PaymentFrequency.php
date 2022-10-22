<?php

namespace App\Enums;

enum PaymentFrequency : string
{
    case weekly = "weekly";
    case bi_weekly = "bi_weekly";
    case fortnightly = "fortnightly";
    case last_working_day = "last_working_day";
    case specific_day = "specific_day";
    case twice_monthly = "twice_monthly";
    case four_weekly = "four_weekly";
    case last_friday = "last_friday";
    case last_thursday = "last_thursday";
    case last_wednesday = "last_wednesday";
    case last_tuesday = "last_tuesday";
    case last_monday = "last_monday";
}
