<?php

namespace App\Enums;

enum ResidentialStatus : string{
    case home_owner = "Home Owner";
    case private_tenant = "Private Tenant";
    case council_tenant = "Council Tenant";
    case living_with_parents = "Living with Parents";
    case living_with_friends = "Living with Friends";
    case student_accommodation = "Student Accommodation";
    case other = "Other";
}
