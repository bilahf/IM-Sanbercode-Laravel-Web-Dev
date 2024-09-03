<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }
    public function register(){
        return view('page.register');
    }

    public function send(Request $request){
        $fname = $request->input('fnama');
        $lname = $request->input('lnama');

        return view('page.welcome', ['fname'=> $fname, 'lname'=>$lname]);
    }

}
