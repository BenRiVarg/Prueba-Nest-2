<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User ;
use App\roles;


use App\SeccionesM ;
use App\SubSeccion ;

use App\Organizadores\DecodificadorM;

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

    
}
