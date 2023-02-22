<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_disallow_if_cookie_doesnt_exist(): void
    {
        $response = $this->get(route('adminpanel'));

        $response->assertRedirect('/');
    }
}
