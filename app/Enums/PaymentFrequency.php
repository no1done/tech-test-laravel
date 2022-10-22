<?php

namespace App\Enums;

enum PaymentFrequency : string
{
    case weekly = "Weekly";
    case bi_weekly = "Bi-Weekly";
    case fortnightly = "Fortnightly";
    case last_working_day = "Last Working Day";
    case specific_day = "Specific Day";
    case twice_monthly = "Twice Monthly";
    case four_weekly = "Four Weekly";
    case last_friday = "Last Friday";
    case last_thursday = "Last Thursday";
    case last_wednesday = "Last Wednesday";
    case last_tuesday = "Last Tuesday";
    case last_monday = "Last Monday";
}
