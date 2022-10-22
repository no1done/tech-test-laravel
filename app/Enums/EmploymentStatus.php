<?php

namespace App\Enums;

enum EmploymentStatus : string
{
    case full_time = "full_time";
    case part_time = "part_time";
    case temporary = "temporary";
    case self_employed = "self_employed";
    case unemployed = "unemployed";
    case pension = "pension";
    case disability = "disability";
    case benefits = "benefits";
    case student = "student";
}
