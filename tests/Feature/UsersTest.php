<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_logged_out_user_cannot_access_user_data()
    {
        auth()->logout();

        $response = $this->getJson('/api/users');
        $response->assertStatus(403);
    }

    public function test_logged_in_user_can_access_user_data()
    {
        auth()->attempt(
            [
                "email" => "test@example.com",
                "password" => "test-password"
            ]
        );
        $this->assertTrue(auth()->check());
        $this->actingAs(auth()->user(), "web");
        $response = $this->getJson('/api/users');
        $response->assertStatus(200);
    }

}
