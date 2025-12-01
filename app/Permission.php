<?php

namespace App;

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
}
