<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{

    public function index()
    {
       if(Auth::user()->role=='visitor'){
       	return view('visitor.home');
       }
       else{
        return view('home');   	
       }
    }
}
