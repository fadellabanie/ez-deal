<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\Elm;
use Illuminate\Support\Facades\Hash;

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
       // return redirect('https://iam.elm.sa/authservice/authorize?scope=openid&response_type=id_token&response_mode=form_post&client_id=16371621&redirect_uri=http://ezdeal.net&nonce=b55224f7-e83d-'.rand(1000,9999).'-'.rand(1000,9999).'-451d32666e59&ui_locales=ar&prompt=login&max_age='.time().'&state='.Hash::make(hash('sha256',time()))); 
       //

        return $this->login($request->all());
    }
}
