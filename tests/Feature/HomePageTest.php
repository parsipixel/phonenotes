<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomePageTest extends TestCase
{
    public function testSuccessfulHome()
    {
        $this->actingAs($this->user);
        $response = $this->get('/home');

        $response->assertStatus(200);
    }

    public function testUnauthenticatedUser()
    {
        $response = $this->get('/home');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}
