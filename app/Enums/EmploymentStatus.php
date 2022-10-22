<?php

namespace App\Enums;

enum EmploymentStatus : string
{
    case full_time = "Full Time";
    case part_time = "Part Time";
    case temporary = "Temporary";
    case self_employed = "Self Employed";
    case unemployed = "Unemployed";
    case pension = "Pension";
    case disability = "Disability";
    case benefits = "Benefits";
    case student = "Student";
}
