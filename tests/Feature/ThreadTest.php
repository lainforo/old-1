<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ThreadTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * Test the thread creation feature
     */
    public function test_create_a_thread(): void
    {
        $dummyThreadData = [
            'subject' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(),
            'board' => 'xyz',
            'indexed' => 1,
            'author' => $this->faker->userName(),
        ];

        $response = $this->post(route('newthread'), $dummyThreadData);

        $response->assertStatus(302);
        $this->assertDatabaseHas('threads', $dummyThreadData);
    }
}
