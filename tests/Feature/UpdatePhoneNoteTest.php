<?php

namespace Tests\Feature;

use App\PhoneNote;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdatePhoneNoteTest extends TestCase
{
    public function testSuccessUpdate()
    {
        $this->actingAs($this->user);
        $phoneNote = factory(PhoneNote::class)->create([
            'user_id' => $this->user->id,
            'name' => 'AAA'
        ]);

        $name = 'BBB';
        $response = $this->put('/phone-notes/' . $phoneNote->id, [
            'name' => $name,
            'phone-number' => $phoneNote->phone_number,
            'description' => $phoneNote->description
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/phone-notes');
        $this->assertDatabaseHas('phone_notes', [
            'id' => $phoneNote->id,
            'name' => $name
        ]);
    }

    public function testInvalidPhoneNumber()
    {
        $this->get('/home');
        $this->actingAs($this->user);
        $phoneNote = factory(PhoneNote::class)->create([
            'user_id' => $this->user->id
        ]);

        $invalidPhoneNumber = '(001) 44 55 667';
        $response = $this->put('/phone-notes/' . $phoneNote->id, [
            'name' => $phoneNote->name,
            'phone-number' => $invalidPhoneNumber,
            'description' => $phoneNote->description
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/home');
        $this->assertDatabaseMissing('phone_notes', [
            'id' => $phoneNote->id,
            'phone_number' => $invalidPhoneNumber
        ]);
        $this->assertDatabaseHas('phone_notes', [
            'id' => $phoneNote->id,
            'phone_number' => $phoneNote->phone_number
        ]);
    }
}
