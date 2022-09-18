<?php

use App\Enums\Permissions;
use App\Enums\Roles;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\Console\Output\ConsoleOutput;

return new class extends Migration
{
    private function getPermissionNamesForRole(string $role): array
    {
        switch($role) {
            case Roles::VIEW_OWN->value;
                return [
                    Permissions::SHOW_OWN_USER->value,
                    Permissions::SHOW_OWN_BANK_ACCOUNT->value,
                    Permissions::LIST_OWN_BANK_ACCOUNTS->value,
                ];
            case Roles::VIEW_OTHERS->value;
                return [
                    Permissions::LIST_USERS->value,
                    Permissions::SHOW_USER->value,
                    Permissions::LIST_BANK_ACCOUNTS->value,
                    Permissions::SHOW_BANK_ACCOUNT->value,
                ];
            case Roles::EDIT_OWN->value;
                return [
                    Permissions::UPDATE_OWN_BANK_ACCOUNT->value,
                    Permissions::CREATE_OWN_BANK_ACCOUNT->value,
                    Permissions::DELETE_OWN_BANK_ACCOUNT->value,
                ];
            case Roles::EDIT_OTHERS->value;
                return [
                    Permissions::UPDATE_BANK_ACCOUNT->value,
                    Permissions::CREATE_BANK_ACCOUNT->value,
                    Permissions::DELETE_BANK_ACCOUNT->value,
                ];
            default:
                return [];
        }
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Permissions::collectValues()->each(function($permissionName) {
            DB::table("permissions")->insertOrIgnore([
                "name" => $permissionName,
                "guard_name" => "web"
            ]);
        });
        $permissions = DB::table("permissions")->get()->pluck("id", "name");

        Roles::collectValues()->each(function($roleName) {
            DB::table("roles")->insertOrIgnore([
                "name" => $roleName,
                "guard_name" => "web"
            ]);
        });
        $roles = DB::table("roles")->get()->pluck("id", "name");
        foreach ($roles as $roleName => $roleId) {
            foreach($this->getPermissionNamesForRole($roleName) as $permissionName) {
                DB::table("role_has_permissions")->insert([
                    "permission_id" => $permissions[$permissionName],
                    "role_id" => $roleId
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table("role_has_permissions")->whereNotNull("permission_id")->delete();
        DB::table("roles")->whereNotNull("id")->delete();
        DB::table("permissions")->whereNotNull("id")->delete();
    }
};
