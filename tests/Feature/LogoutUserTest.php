<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LogoutUserTest extends TestCase
{
    public function testSuccessfulLogout()
    {
        $this->actingAs($this->user);
        $this->get('phone-notes');
        $response = $this->post('/logout');

        $response->assertStatus(302);
        $this->assertFalse(\Auth::check());
        $response->assertRedirect('/');
    }
}
