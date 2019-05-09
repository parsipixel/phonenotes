<?php

namespace Tests\Unit;

use App\PhoneNote;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PhoneNoteTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testSuccessfulPhoneNoteUserRelation()
    {
        $phoneNote = factory(PhoneNote::class)->create([
            'user_id' => $this->user->id
        ]);

        $this->assertEquals($phoneNote->user->id, $this->user->id);
    }
}
