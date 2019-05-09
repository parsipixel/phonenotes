<?php

namespace Tests\Feature;

use App\PhoneNote;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeletePhoneNoteTest extends TestCase
{
    public function testSuccessfulDelete()
    {
        $this->get('/');
        $this->actingAs($this->user);
        $phoneNote = factory(PhoneNote::class)->create();

        $response = $this->delete('/phone-notes/' . $phoneNote->id);

        $response->assertStatus(302);
        $response->assertRedirect('/phone-notes');
        $this->assertSoftDeleted('phone_notes', [
            'id' => $phoneNote->id,
        ]);
    }
}
