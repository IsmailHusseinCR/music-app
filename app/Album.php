<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    
    protected $table = "albums";
   
    
    public function genre()
    {
        return $this->belongsTo('App\Genre');
    }

    public function songs()
    {
        return $this->hasMany('App\Song');
    }

    public function bookmarks()
    {
        return $this->hasMany('App\Bookmarks');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public static function scopeSearch($query, $search)
    {


        return $query
            ->leftJoin('genres', 'albums.genre_id', '=', 'genres.id')
            ->leftJoin('users', 'albums.user_id', '=', 'users.id')
            ->where('title', 'like', "%" . $search . "%")
            ->orWhere('genres.name', 'like', "%" . $search . "%")
            ->orWhere('users.name', 'like', "%" . $search . "%");
    }
}
