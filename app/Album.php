<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //
    protected $table = "albums";
   
    
    public function genre()
    {
        return $this->belongsTo('App\Genre');
    }

    public function songs()
    {
        return $this->hasMany('App\Song');
    }
}
