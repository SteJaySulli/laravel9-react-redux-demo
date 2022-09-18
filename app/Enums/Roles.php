<?php
namespace App\Enums;

enum Roles: string
{
    use EnumToArray;
    
    case VIEW_OWN = "view_own";
    case EDIT_OWN = "edit_own";
    case VIEW_OTHERS = "view_others";
    case EDIT_OTHERS = "edit_others";
}