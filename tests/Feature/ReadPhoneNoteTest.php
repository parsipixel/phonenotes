<?php

namespace Tests\Feature;

use App\PhoneNote;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadPhoneNoteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSuccessfulRead()
    {
        $this->actingAs($this->user);
        $phoneNote = factory(PhoneNote::class)->create();

        $response = $this->get('/phone-notes/' . $phoneNote->id);

        $response->assertStatus(200);
        $this->assertContains($phoneNote->name, $response->getContent());
        $this->assertNotContains($phoneNote->name . 'MMM', $response->getContent());
    }
}
