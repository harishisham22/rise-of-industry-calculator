<?php

namespace App\Enums;

enum Permission: string
{
    case CREATE_USER = 'create user';
    case VIEW_USER = 'view user';
    case UPDATE_USER = 'update user';
    case DELETE_USER = 'delete user';
    case LIST_USER = 'list user';
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

    public function label(): string
    {
        return match ($this) {
            self::CREATE_USER => 'Create User',
            self::VIEW_USER => 'View User',
            self::UPDATE_USER => 'Update User',
            self::DELETE_USER => 'Delete User',
            self::LIST_USER => 'List User',
            self::CREATE_BUILDING => 'Create Building',
            self::VIEW_BUILDING => 'View Building',
            self::UPDATE_BUILDING => 'Update Building',
            self::DELETE_BUILDING => 'Delete Building',
            self::LIST_BUILDING => 'List Building',
            self::CREATE_ITEM => 'Create Item',
            self::VIEW_ITEM => 'View Item',
            self::UPDATE_ITEM => 'Update Item',
            self::DELETE_ITEM => 'Delete Item',
            self::LIST_ITEM => 'List Item',
            self::CREATE_BUILDING_TYPE => 'Create Building Type',
            self::VIEW_BUILDING_TYPE => 'View Building Type',
            self::UPDATE_BUILDING_TYPE => 'Update Building Type',
            self::DELETE_BUILDING_TYPE => 'Delete Building Type',
            self::LIST_BUILDING_TYPE => 'List Building Type',
            self::CREATE_ITEM_TYPE => 'Create Item Type',
            self::VIEW_ITEM_TYPE => 'View Item Type',
            self::UPDATE_ITEM_TYPE => 'Update Item Type',
            self::DELETE_ITEM_TYPE => 'Delete Item Type',
            self::LIST_ITEM_TYPE => 'List Item Type',
        };
    }
}
