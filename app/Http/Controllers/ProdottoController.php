<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;

class ProdottoController extends Controller
{
    public function showShop()
    {
        session_start();
        $dl = new DataLayer();
        $squadre = $dl -> elencaSquadre();
        $prodotti = $dl -> elencaProdotti();

        if(isset($_SESSION['logged'])){
            return view('shop.shop')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('squadre', $squadre)->with('prodotti', $prodotti);
        } else {
            return view('shop.shop')->with('logged', false)->with('squadre', $squadre)->with('prodotti', $prodotti);
        }
        
    }

    public function index(){
        session_start();
        $dl = new DataLayer();
        $prodotti = $dl -> elencaProdotti();
        $squadre = $dl -> elencaSquadre();
        if(isset($_SESSION['logged'])){
            return view('admin.gestioneShop')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('prodotti', $prodotti)->with('squadre', $squadre);
        } else {
            return view('admin.gestioneShop')->with('logged', false)->with('prodotti', $prodotti)->with('squadre', $squadre);
        }
    }
}
