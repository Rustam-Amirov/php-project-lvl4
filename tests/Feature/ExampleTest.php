<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testTheApplicationReturnsASuccessfulResponse()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
