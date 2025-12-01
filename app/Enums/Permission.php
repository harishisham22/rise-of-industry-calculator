<?php

namespace App\Enums;

enum Permission: string
{
    case CREATE_ACCOUNT = 'create account';
    case VIEW_ACCOUNT = 'view account';
    case UPDATE_ACCOUNT = 'update account';
    case DELETE_ACCOUNT = 'delete account';
    case LIST_ACCOUNT = 'list account';
    case CREATE_BUILDING = 'create building';
    case VIEW_BUILDING = 'view building';
    case UPDATE_BUILDING = 'update building';
    case DELETE_BUILDING = 'delete building';
    case LIST_BUILDING = 'list building';
    case CREATE_ITEM = 'create item';
    case VIEW_ITEM = 'view item';
    case UPDATE_ITEM = 'update item';
    case DELETE_ITEM = 'delete item';
    case LIST_ITEM = 'list item';
    case CREATE_BUILDING_TYPE = 'create building type';
    case VIEW_BUILDING_TYPE = 'view building type';
    case UPDATE_BUILDING_TYPE = 'update building type';
    case DELETE_BUILDING_TYPE = 'delete building type';
    case LIST_BUILDING_TYPE = 'list building type';
    case CREATE_ITEM_TYPE = 'create item type';
    case VIEW_ITEM_TYPE = 'view item type';
    case UPDATE_ITEM_TYPE = 'update item type';
    case DELETE_ITEM_TYPE = 'delete item type';
    case LIST_ITEM_TYPE = 'list item type';
}
