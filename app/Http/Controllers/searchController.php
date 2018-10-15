<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class searchController extends Controller
{
    public function index(Request $request)
    {
       $s = $request->input('s');
       $albums = Album::latest()
       ->search($s)
       ->paginate(10);
       
       return view('pages.search', compact('albums', 's'));
    }
}
