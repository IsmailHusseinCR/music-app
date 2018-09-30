<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class CrudController extends Controller
{
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
        $album->artist_id = 1;
        $album->genre_id = 1;
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
        $albums = Album::find($id);
        return view('album.specific')->with('albums', $albums);
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
        
        // Hardcoded maar zou met een relatie + dropdown values kunnen worden gefixt

        $album = Album::find($id);
        $album->title = $request->input('title');
        $album->artist_id = 1;
        $album->genre_id = 1;
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
        $album->delete();
        return redirect('/album')->with('success', 'Album deleted');
    }
}
