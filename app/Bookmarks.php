<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmarks extends Model
{
    protected $table = "bookmarks";

    public function album()
    {
        return $this->belongsTo('App\Album');
    }


}
