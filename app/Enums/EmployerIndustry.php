<?php

namespace App\Enums;

enum EmployerIndustry : string
{
    case construction_manufacturing = "construction_manufacturing";
    case military = "military";
    case health = "health";
    case banking_insurance = "banking_insurance";
    case education = "education";
    case civil_service = "civil_service";
    case supermarket_retail = "supermarket_retail";
    case utilities_telecom = "utilities_telecom";
    case hotel_restaurant_leisure = "hotel_restaurant_leisure";
    case other_office_based = "other_office_based";
    case other_not_office_based = "other_not_office_based";
    case driving_delivery = "driving_delivery";
    case administration_secretiarial = "administration_secretiarial";
    case midlevel_management = "midlevel_management";
    case seniorlevel_management = "seniorlevel_management";
    case skilled_trade = "skilled_trade";
    case professional = "professional";
    case none = "none";
}
