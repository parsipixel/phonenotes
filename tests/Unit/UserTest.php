<?php

namespace Tests\Unit;

use App\PhoneNote;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testSuccessfulUserPhoneNoteRelation()
    {
        $phoneNotes = factory(PhoneNote::class, 10)->create([
            'user_id' => $this->user->id
        ]);

        $this->assertEquals($phoneNotes->first()->user_id, $this->user->id);
        $this->assertEquals(10, $this->user->phoneNotes->count());
    }
}
