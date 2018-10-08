<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    //
    protected $table = 'songs';

    public function album()
    {
        return $this->belongsTo('App\Album');
    }
    
    public function lyrics(){

        return $this->belongsTo('App\Lyrics');
    }
}
