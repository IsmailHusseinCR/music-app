<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lyrics extends Model
{
    //
    protected $table = 'lyrics';

    public function song()
    {
        return $this->hasOne('App\Song');
    }
}
