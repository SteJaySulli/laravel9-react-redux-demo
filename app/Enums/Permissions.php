<?php
namespace App\Enums;

enum Permissions: string
{
    use EnumToArray;

    case LIST_USERS = "list_users";
    case SHOW_USER = "show_user";
    case SHOW_OWN_USER = "show_own_user";

    case LIST_OWN_BANK_ACCOUNTS = "list_own_bank_accounts";
    case SHOW_OWN_BANK_ACCOUNT = "show_own_bank_account";
    case UPDATE_OWN_BANK_ACCOUNT = "update_own_bank_account";
    case CREATE_OWN_BANK_ACCOUNT = "create_own_bank_account";
    case DELETE_OWN_BANK_ACCOUNT = "delete_own_bank_account";

    case LIST_BANK_ACCOUNTS = "list_bank_accounts";
    case SHOW_BANK_ACCOUNT = "show_bank_account";
    case UPDATE_BANK_ACCOUNT = "update_bank_account";
    case CREATE_BANK_ACCOUNT = "create_bank_account";
    case DELETE_BANK_ACCOUNT = "delete_bank_account";
}