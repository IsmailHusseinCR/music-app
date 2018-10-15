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

    public function user(){
        return $this->belongsTo('App\User');
    }

    public static function scopeSearch($query, $search)
    {
        return $query
        ->where('title', 'like', "%" . $search . "%");

        // check model relationship search query with orwhere
        //->orWhere('genre', 'like', "%" . $search . "%");
    }
}
