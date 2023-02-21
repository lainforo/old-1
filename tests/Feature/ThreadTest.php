<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ThreadTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * Test the thread creation feature
     */
    public function test_create_a_thread(): void
    {
        $subject = $this->faker->sentence;
        $body = $this->faker->paragraph;
        $username = $this->faker->userName;
        $board = 'b';
        $indexed = 1;

        $response = $this->post('/thread/new', [
            'subject' => $subject,
            'body' => $body,
            'author' => $username,
            'board' => $board,
            'indexed' => $indexed,
        ]);

        $response->assertRedirect('/');
        $this->assertDatabaseHas('threads', [
            'subject' => $subject,
            'body' => $body,
            'author' => $username,
            'board' => $board,
            'indexed' => $indexed,
        ]);
    }
}
