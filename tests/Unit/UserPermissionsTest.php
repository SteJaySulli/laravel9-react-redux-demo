<?php

namespace Tests\Unit;

use App\Enums\Permissions;
use App\Enums\Roles;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserPermissionsTest extends TestCase
{
    public function test_view_own_role_is_correct()
    {
        $user = User::factory()->create()->first();
        $user->syncRoles([Roles::VIEW_OWN->value]);

        $this->assertTrue($user->can(Permissions::SHOW_OWN_USER->value));
        $this->assertTrue($user->can(Permissions::SHOW_OWN_BANK_ACCOUNT->value));
        $this->assertTrue($user->can(Permissions::LIST_OWN_BANK_ACCOUNTS->value));

        $this->assertFalse($user->can(Permissions::LIST_USERS->value));
        $this->assertFalse($user->can(Permissions::SHOW_USER->value));
        $this->assertFalse($user->can(Permissions::LIST_BANK_ACCOUNTS->value));
        $this->assertFalse($user->can(Permissions::SHOW_BANK_ACCOUNT->value));

        $this->assertFalse($user->can(Permissions::UPDATE_OWN_BANK_ACCOUNT->value));
        $this->assertFalse($user->can(Permissions::CREATE_OWN_BANK_ACCOUNT->value));
        $this->assertFalse($user->can(Permissions::DELETE_OWN_BANK_ACCOUNT->value));
        
        $this->assertFalse($user->can(Permissions::UPDATE_BANK_ACCOUNT->value));
        $this->assertFalse($user->can(Permissions::CREATE_BANK_ACCOUNT->value));
        $this->assertFalse($user->can(Permissions::DELETE_BANK_ACCOUNT->value));

        $user->delete();
    }

    public function test_view_others_role_is_correct()
    {
        $user = User::factory()->create()->first();
        $user->syncRoles([Roles::VIEW_OTHERS->value]);

        $this->assertFalse($user->can(Permissions::SHOW_OWN_USER->value));
        $this->assertFalse($user->can(Permissions::SHOW_OWN_BANK_ACCOUNT->value));
        $this->assertFalse($user->can(Permissions::LIST_OWN_BANK_ACCOUNTS->value));

        $this->assertTrue($user->can(Permissions::LIST_USERS->value));
        $this->assertTrue($user->can(Permissions::SHOW_USER->value));
        $this->assertTrue($user->can(Permissions::LIST_BANK_ACCOUNTS->value));
        $this->assertTrue($user->can(Permissions::SHOW_BANK_ACCOUNT->value));

        $this->assertFalse($user->can(Permissions::UPDATE_OWN_BANK_ACCOUNT->value));
        $this->assertFalse($user->can(Permissions::CREATE_OWN_BANK_ACCOUNT->value));
        $this->assertFalse($user->can(Permissions::DELETE_OWN_BANK_ACCOUNT->value));
        
        $this->assertFalse($user->can(Permissions::UPDATE_BANK_ACCOUNT->value));
        $this->assertFalse($user->can(Permissions::CREATE_BANK_ACCOUNT->value));
        $this->assertFalse($user->can(Permissions::DELETE_BANK_ACCOUNT->value));

        $user->delete();
    }

    public function test_edit_own_role_is_correct()
    {
        $user = User::factory()->create()->first();
        $user->syncRoles([Roles::EDIT_OWN->value]);

        $this->assertFalse($user->can(Permissions::SHOW_OWN_USER->value));
        $this->assertFalse($user->can(Permissions::SHOW_OWN_BANK_ACCOUNT->value));
        $this->assertFalse($user->can(Permissions::LIST_OWN_BANK_ACCOUNTS->value));

        $this->assertFalse($user->can(Permissions::LIST_USERS->value));
        $this->assertFalse($user->can(Permissions::SHOW_USER->value));
        $this->assertFalse($user->can(Permissions::LIST_BANK_ACCOUNTS->value));
        $this->assertFalse($user->can(Permissions::SHOW_BANK_ACCOUNT->value));

        $this->assertTrue($user->can(Permissions::UPDATE_OWN_BANK_ACCOUNT->value));
        $this->assertTrue($user->can(Permissions::CREATE_OWN_BANK_ACCOUNT->value));
        $this->assertTrue($user->can(Permissions::DELETE_OWN_BANK_ACCOUNT->value));
        
        $this->assertFalse($user->can(Permissions::UPDATE_BANK_ACCOUNT->value));
        $this->assertFalse($user->can(Permissions::CREATE_BANK_ACCOUNT->value));
        $this->assertFalse($user->can(Permissions::DELETE_BANK_ACCOUNT->value));

        $user->delete();
    }

    public function test_edit_others_role_is_correct()
    {
        $user = User::factory()->create()->first();
        $user->syncRoles([Roles::EDIT_OTHERS->value]);

        $this->assertFalse($user->can(Permissions::SHOW_OWN_USER->value));
        $this->assertFalse($user->can(Permissions::SHOW_OWN_BANK_ACCOUNT->value));
        $this->assertFalse($user->can(Permissions::LIST_OWN_BANK_ACCOUNTS->value));

        $this->assertFalse($user->can(Permissions::LIST_USERS->value));
        $this->assertFalse($user->can(Permissions::SHOW_USER->value));
        $this->assertFalse($user->can(Permissions::LIST_BANK_ACCOUNTS->value));
        $this->assertFalse($user->can(Permissions::SHOW_BANK_ACCOUNT->value));

        $this->assertFalse($user->can(Permissions::UPDATE_OWN_BANK_ACCOUNT->value));
        $this->assertFalse($user->can(Permissions::CREATE_OWN_BANK_ACCOUNT->value));
        $this->assertFalse($user->can(Permissions::DELETE_OWN_BANK_ACCOUNT->value));
        
        $this->assertTrue($user->can(Permissions::UPDATE_BANK_ACCOUNT->value));
        $this->assertTrue($user->can(Permissions::CREATE_BANK_ACCOUNT->value));
        $this->assertTrue($user->can(Permissions::DELETE_BANK_ACCOUNT->value));

        $user->delete();
    }
}
