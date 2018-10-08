<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin()
    {
        $admin = User::where('type', 'admin')->first();

        /// collection 

        return view('admin.admin', compact('admin'));
    }
}
