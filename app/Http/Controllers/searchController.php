<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class searchController extends Controller
{
    public function index(Request $request)
    {
       $s = $request->input('s');
       $albums = Album::orderBy('name', 'desc')
       ->search($s)
       ->get();
       return view('pages.search', compact('albums', 's'));
    }
}
