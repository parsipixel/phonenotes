<?php

use Illuminate\Database\Seeder;

class PhoneNotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PhoneNote::class, 20)->create([
            'user_id' => factory(\App\User::class)->create([
                'email' => 'nazari.dev@gmail.com',
                'name' => 'Ali'
            ])->id
        ]);
    }
}
