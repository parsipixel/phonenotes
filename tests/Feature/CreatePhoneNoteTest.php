<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreatePhoneNoteTest extends TestCase
{
    public function testSuccessCreate()
    {
        $this->actingAs($this->user);

        $name = 'TestName';
        $phoneNumber = '8877665';
        $description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. \n Ab, accusamus accusantium commodi, consequatur debitis ducimus expedita iste laboriosam libero magnam natus nisi non optio quam quas quasi qui repellat velit?";
        $response = $this->post('/phone-notes', [
            'name' => $name,
            'phone-number' => $phoneNumber,
            'description' => $description,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/phone-notes');
        $this->assertDatabaseHas('phone_notes', [
            'name' => $name,
            'phone_number' => $phoneNumber,
            'description' => $description
        ]);
    }

    public function testInvalidPhoneNumber()
    {
        $this->get('/home');
        $this->actingAs($this->user);

        $response = $this->post('/phone-notes', [
            'name' => 'Test',
            'phone-number' => '(001) 44 55 667',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, accusamus accusantium commodi, consequatur debitis ducimus expedita iste laboriosam libero magnam natus nisi non optio quam quas quasi qui repellat velit?',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/home');
    }

    public function testEmptyDescription()
    {
        $this->get('/home');
        $this->actingAs($this->user);

        $response = $this->post('/phone-notes', [
            'name' => 'Test',
            'phone-number' => '8877665',
            'description' => '',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/home');
    }

    public function testEmptyName()
    {
        $this->get('/home');
        $this->actingAs($this->user);

        $response = $this->post('/phone-notes', [
            'name' => '',
            'phone-number' => '8877665',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, accusamus accusantium commodi, consequatur debitis ducimus expedita iste laboriosam libero magnam natus nisi non optio quam quas quasi qui repellat velit?',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/home');
    }

    public function testEmptyPhoneNumber()
    {
        $this->get('/home');
        $this->actingAs($this->user);

        $response = $this->post('/phone-notes', [
            'name' => 'Test',
            'phone-number' => '',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, accusamus accusantium commodi, consequatur debitis ducimus expedita iste laboriosam libero magnam natus nisi non optio quam quas quasi qui repellat velit?',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/home');
    }
}
