<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class FrontController extends Controller
{
    public function getHome()
    {
        session_start();

        if(isset($_SESSION['logged'])){
            return view('home')->with('logged', true)->with('loggedName', $_SESSION['loggedName']);
        }
            
        else
        return view('home')->with('logged', false);
        
    }
}
