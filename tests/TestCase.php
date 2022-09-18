<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

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

        Artisan::call('migrate'); // runs the migration
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
