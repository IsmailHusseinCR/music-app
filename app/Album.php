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

    public function user(){
        return $this->belongsTo('App\User');
    }

    public static function scopeSearch($query, $search)
    {
//        return $query
//            ->join('genres', function($join) use ($search){
//                $join->on('genre_id' ,'=', 'genres.id')
//                ->where('title', 'like', "%" . $search . "%")
//                ->orWhere('name', 'like', "%" . $search . "%");
//        });
        //->where('title', 'like', "%" . $search . "%");

        return $query
            ->leftJoin('genres', 'albums.genre_id', '=', 'genres.id')
            //->leftJoin('users', 'albums.user_id', '=', 'users.id')
            ->where('title', 'like', "%" . $search . "%")
            ->orWhere('genres.name', 'like', "%" . $search . "%");

        // check model relationship search query with orwhere
        //->orWhere('genre', 'like', "%" . $search . "%");
    }
}
