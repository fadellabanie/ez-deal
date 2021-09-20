<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\Elm;

class HomeController extends Controller
{

    use Elm;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
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

    public function testElm(Request $request)
    {
      
        return $this->login($request->all());
    }
}
