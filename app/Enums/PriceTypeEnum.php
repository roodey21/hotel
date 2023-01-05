<?php

namespace App\Enums;

enum PriceTypeEnum: string
{
    case WEEKDAY = 'weekday';
    case WEEKEND = 'weekend';
    case PEAK_SEASON = 'peak_season';
}
