<?php

use Illuminate\Database\Seeder;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('albums')->insert([
            'title' => str_random(10),
            'added_on' => "2018-10-01 15:41:04",
            'artist_id' => 1,
            'genre_id' => 1,
        ]);
    }
}
