<?php

use Illuminate\Database\Seeder;

class LyricsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('lyrics')->insert([
            // 'song_id' => 1,
            'text' => str_random(50)
        ]);
    }
}
