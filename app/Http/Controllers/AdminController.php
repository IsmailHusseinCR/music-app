<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Album;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin()
    {
        $albums = Album::all();
        $admin = User::where('type', 'admin')->first();

        /// collection 

        return view('admin.admin', compact('admin', 'albums'));
    }

    public function switch(Request $request)
    {

        $message = $request->get('message');
        $id = $request->get('id');

        $album = Album::find($id);

        ($album->active == 1) ? $album->active = 0 : $album->active = 1;


         $album->save();
         return redirect('/admin')->with('success', $message);
    }

}
