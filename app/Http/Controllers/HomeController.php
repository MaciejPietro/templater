<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        return view('front.home.index');
    }

    public function register(){
        return view('front.home.register');
    }

    public function register_success(){
        return view('front.home.register_success');
    }

    public function password_reset_form(){
        return view('front.home.password_reset_form');
    }

    public function password_reset(Request $request, string $token){
        return view('front.home.password_reset', ['email' => $request->email, 'token' => $token]);
    }

}
