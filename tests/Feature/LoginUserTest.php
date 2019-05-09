<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginUserTest extends TestCase
{
    public function testSuccessfulLogin()
    {
        $this->get('/login');
        $response = $this->post('/login', [
            'email' => $this->user->email,
            'password' => 'password'
        ]);
        
        $response->assertStatus(302);
        $this->assertTrue(\Auth::check());
        $response->assertRedirect('/phone-notes');
    }


    public function testInvalidCredentials()
    {
        $this->get('/login');
        $response = $this->post('/login', [
            'email' => 'invalid-email@mail.com',
            'password' => '456788765'
        ]);

        $response->assertStatus(302);
        $this->assertFalse(\Auth::check());
        $response->assertRedirect('/login');
    }
}
