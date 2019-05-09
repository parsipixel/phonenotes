<?php

namespace Tests\Feature;

use App\PhoneNote;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DownloadPhoneNoteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSuccessfulDownload()
    {
        $this->actingAs($this->user);
        $phoneNotes = factory(PhoneNote::class, 10)->create([
            'user_id' => $this->user->id
        ]);

        $response = $this->get('/phone-notes/download');
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/pdf');
    }
}
