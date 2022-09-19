<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function test_login_without_credentials_fails()
    {
        $response = $this->postJson('/api/auth/login');
        
        $response->assertStatus(422);
    }

    public function test_login_with_incorrect_email_fails()
    {
        $response = $this->postJson(
            '/api/auth/login',
            [
                "email" => "test@doesntexist.com",
                "password" => "test-password"
            ]
        );
        
        $response->assertStatus(403);
    }

    public function test_login_with_incorrect_password_fails()
    {
        $response = $this->postJson(
            '/api/auth/login',
            [
                "email" => "test@example.com",
                "password" => "wrong-password"
            ]
        );
        
        $response->assertStatus(403);
    }

    public function test_login_with_correct_credentials_authorises_user()
    {
        $response = $this->postJson(
            '/api/auth/login',
            [
                "email" => "test@example.com",
                "password" => "test-password"
            ]
        );
        
        $user = User::where("email", "test@example.com")->first();

        $response->assertStatus(200);
        $response->assertExactJson([
            "user_id" => $user->id,
            "name" => $user->name,
            "email" => $user->email,
        ]);
        $this->assertTrue(auth()->check());
    }

    public function test_logout_deauthorises_user()
    {
        $response = $this->postJson('/api/auth/logout');

        $response->assertStatus(200);
        $this->assertFalse(auth()->check());
    }
}
