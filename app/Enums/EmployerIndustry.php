<?php

namespace App\Enums;

enum EmployerIndustry : string
{
    case construction_manufacturing = "Construction Manufacturing";
    case military = "Military";
    case health = "Health";
    case banking_insurance = "Banking and Insurance";
    case education = "Education";
    case civil_service = "Civil Service";
    case supermarket_retail = "Supermarket or Retail";
    case utilities_telecom = "Utilities and Telecoms";
    case hotel_restaurant_leisure = "Hotel / Restaurant / Leisure";
    case other_office_based = "Other - Office Based";
    case other_not_office_based = "Other - Non Office Based";
    case driving_delivery = "Driving or Delivery";
    case administration_secretiarial = "Admin and Secretarial";
    case midlevel_management = "Midlevel Management";
    case seniorlevel_management = "Senior Level Management";
    case skilled_trade = "Skilled Trade";
    case professional = "Professional";
    case none = "None";
}
