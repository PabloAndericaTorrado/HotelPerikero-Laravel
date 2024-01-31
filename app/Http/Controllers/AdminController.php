<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admins.dashboard');
    }

    public function parking(){
        return view ('workers.parking');
    }
}
