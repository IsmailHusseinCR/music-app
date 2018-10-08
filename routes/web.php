<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use App\Test as Test;
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('pages.index');
});

// in de toekomst met {id} of een AlbumController

// Route::get('/album', function(){
//     return view('pages.album');
// });


// Route::get('/album/songs', function(){
//   return view('pages.songs');
// });

Route::resource('album', 'CrudController');
Route::resource('song', 'SongController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@admin')    
    ->middleware('is_admin')    
    ->name('admin');
    

/// PDF TUTORIAL


// Route::get('/testing/{id}', function($id){
//     // //return view('testing');
//     // echo 'The requested id is ' . $id;

//     $test = Test::find($id);
//     echo 'Name ' . $test->name . '<br />';
//     echo 'Testing ' . $test->testing . '<br />';
//     echo 'Email ' . $test->email . '<br />';
// });

// Route::get('add', function(){
//     echo '<form method ="POST" action="/add">
//           <input type="text" name="name" placeholder="name">
//           <input type="text" name="testing" placeholder="testing">
//           <input type="text" name="email" placeholder="email">
//           <input type="hidden" name="_token" value="' . csrf_token() .'">
//           <input type="submit" value="Create testing database record">
//           </form>';
// });

// Route::post('/add', function(Request $request){

//     // $test = new Test();
//     // $test->name = $request->name;
//     // $test->testing = $request->testing;
//     // $test->email = $request->email;
//     // $test->save();

//     $test = Test::create($request->all());

//     //eloquent manier om niet elke keer request opnieuw te tikken
//     echo 'Hello im here';
// });

