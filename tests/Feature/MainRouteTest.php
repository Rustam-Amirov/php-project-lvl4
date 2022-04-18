<?php

namespace Tests\Feature;

use Tests\TestCase;

class MainRouteTest extends TestCase
{
    public function testRouteMain()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
