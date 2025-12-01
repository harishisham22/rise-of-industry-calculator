<?php

namespace App;

enum BuildingType: string
{
    case SHOP = 'shop';
    case FACTORY = 'factory';
    case RESOURCE_COLLECTOR = 'resource_collector';
    case STORAGE = 'storage';
}
