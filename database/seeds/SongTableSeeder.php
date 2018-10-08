<?php

use Illuminate\Database\Seeder;

class SongTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('songs')->insert([
            'title' => str_random(10),
            'lyrics_id' => 1,
            'album_id' => 1,
        ]);
    }
}
