<?php

namespace App\Enums;

enum ResidentialStatus : string{
    case home_owner = "home_owner";
    case private_tenant = "private_tenant";
    case council_tenant = "council_tenant";
    case living_with_parents = "living_with_parents";
    case living_with_friends = "living_with_friends";
    case student_accommodation = "student_accommodation";
    case other = "other";
}
