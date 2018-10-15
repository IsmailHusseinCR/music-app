<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Song;

class CrudController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $albums = Album::orderBy('added_on','desc')->get();
        return view('album.index')->with('albums',$albums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('album.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required'
        ]);
        
        // Hardcoded maar zou met een relatie + dropdown values kunnen worden gefixt

        $album = new Album;
        
        $album->title = $request->input('title');
        $album->user_id = auth()->user()->id;
        $album->genre_id = $request->input('genre');
        $album->added_on = $request->input('date');
        $album->save();

        return redirect('/album')->with('success', 'Album created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $album = Album::find($id);
        return view('album.specific', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $albums = Album::find($id);

        if(auth()->user()->id !== $albums->user->id && !auth()->user()->isAdmin()){
            if(auth()->user()->isAdmin()){
                return view('album.edit')->with('albums', $albums);
            }
            return redirect('/album')->with('error', 'Not authorized');
        }

        return view('album.edit')->with('albums', $albums);
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required'
        ]);
    

        $album = Album::find($id);
        $album->title = $request->input('title');
        $album->user_id = auth()->user()->id;
        $album->genre_id = $request->input('genre');
        $album->added_on = $request->input('date');
        $album->save();

        return redirect('/album')->with('success', 'Album updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::find($id);
        
        if(auth()->user()->id !== $albums->user->id && !auth()->user()->isAdmin()){
            if(auth()->user()->isAdmin()){
                return view('album.edit')->with('albums', $albums);
            }
            return redirect('/album')->with('error', 'Not authorized');
        }

        $album->delete();
        return redirect('/album')->with('success', 'Album deleted');
    }

}
