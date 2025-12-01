<?php

namespace App\Enums;

enum BuildingType: string
{
    case SHOP = 'shop';
    case FACTORY = 'factory';
    case RESOURCE_COLLECTOR = 'resource collector';
    case STORAGE = 'storage';
}
