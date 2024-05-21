<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;
use Illuminate\Support\Facades\Redirect;

class RoseController extends Controller
{
    public function index()
    {
        session_start();
        $dl = new DataLayer();
        $listaGiocatori = $dl -> elencaGiocatori();
        if (isset ($_SESSION['logged'])) {
            return view('rose.pulciniU10')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('listaGiocatori', $listaGiocatori);
        } else {
            return view('rose.pulciniU10')->with('logged', false)->with('listaGiocatori', $listaGiocatori);
        }

    }

    public function create()
    {
        
    }


}
