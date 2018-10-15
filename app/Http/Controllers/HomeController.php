<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Album;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        // snap niet waarom where met $user niet werkt maar oke
        $albums = Album::where('user_id', $user->id)->get();
        return view('pages.home')->with('albums', $albums);
        //return view('pages.home', compact($user));
    }
}
