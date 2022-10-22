<?php

namespace App\Enums;

enum MaritalStatus : string {
    case single = "single";
    case married = "married";
    case living_together = "living_together";
    case separated = "separated";
    case divorced = "divorced";
    case widowed = "widowed";
    case other = "other";
}
