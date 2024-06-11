<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;



class FrontController extends Controller
{
    public function getHome()
    {
        session_start();
        $dl = new DataLayer();
        $squadre = $dl -> elencaSquadre();
        if(isset($_SESSION['logged'])){
            return view('home')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('squadre', $squadre);
        }
            
        else
        return view('home')->with('logged', false)->with('squadre', $squadre);
        
    }
}
