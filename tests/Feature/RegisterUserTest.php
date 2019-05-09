<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterUserTest extends TestCase
{
    public function testSuccessfulRegister()
    {
        $this->get('/register');
        $response = $this->post('/register', [
            'name' => 'Test Name',
            'email' => 'test_register_user@testmail.com',
            'password' => '123456789',
            'password_confirmation' => '123456789',
        ]);

        $this->assertTrue(\Auth::check());
        $response->assertStatus(302);
        $response->assertRedirect('/phone-notes');
        $this->assertDatabaseHas('users', [
            'email' => 'test_register_user@testmail.com'
        ]);
    }

    public function testInvalidPasswordConfirmation()
    {
        $this->get('/register');
        $response = $this->post('/register', [
            'name' => 'Test Name',
            'email' => 'test_register_user@testmail.com',
            'password' => '123456789',
            'password_confirmation' => '1234567891',
        ]);

        $this->assertFalse(\Auth::check());
        $response->assertStatus(302);
        $response->assertRedirect('/register');
        $this->assertDatabaseMissing('users', [
            'email' => 'test_register_user@testmail.com'
        ]);
    }

    public function testInvalidEmail()
    {
        $this->get('/register');
        $response = $this->post('/register', [
            'name' => 'Test Name',
            'email' => 'test_register_user',
            'password' => '123456789',
            'password_confirmation' => '123456789',
        ]);

        $this->assertFalse(\Auth::check());
        $response->assertStatus(302);
        $response->assertRedirect('/register');
        $this->assertDatabaseMissing('users', [
            'email' => 'test_register_user@testmail.com'
        ]);
    }
}
