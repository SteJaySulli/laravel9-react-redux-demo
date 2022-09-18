<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AppliationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_the_application_presents_a_react_mount_point()
    {
        $response = $this->get('/');
        
        $response->assertSee('id="react-app"', false);

    }
}
