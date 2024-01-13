<?php

namespace App\Http\Controllers;

use App\Models\Habitacion;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function welcome()
    {
        $habitacion3 = Habitacion::find(3);
        $habitacion7 = Habitacion::find(7);
        $habitacion8 = Habitacion::find(8);

        return view('welcome', [
            'habitacion3' => $habitacion3,
            'habitacion7' => $habitacion7,
            'habitacion8' => $habitacion8,
        ]);
    }

}
