<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookmarks;

class BookmarkController extends Controller
{
    //

    public function index(Request $request)
    {
        $bookmark = new Bookmarks;
        $bookmark->album_id = $request->input('id');
        $bookmark->user_id = $request->input('user_id');
        $bookmark->save();
        return redirect('/home')->with('success', 'Bookmark created');
    }
}
