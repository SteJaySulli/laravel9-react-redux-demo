<?php

namespace Tests;

use App\Enums\Roles;
use App\Models\BankAccount;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $faker;

    /**
     * Sets up the tests
     */
    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('migrate:fresh'); // runs the migration
        User::factory()->create([
            "name" => "Test User",
            "email" => "test@example.com",
            "password" => Hash::make("test-password"),
        ]);
        $user = User::where("email","test@example.com")->first();
        $user->assignRole(Roles::values());
        BankAccount::factory(5)->create([
            "user_id" => $user->id
        ]);

    }


    /**
     * Rolls back migrations
     */
    public function tearDown(): void
    {
        Artisan::call('db:wipe');

        parent::tearDown();
    }
}
