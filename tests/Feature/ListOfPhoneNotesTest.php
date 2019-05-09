<?php

namespace Tests\Feature;

use App\PhoneNote;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListOfPhoneNotesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSuccessfulList()
    {
        $this->actingAs($this->user);
        $phoneNote = factory(PhoneNote::class)->create();

        $response = $this->get('/phone-notes');
        $response->assertStatus(200);
        $this->assertContains($phoneNote->name, $response->getContent());
    }

    public function testUnauthorizedUser()
    {
        $response = $this->get('/phone-notes');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}
