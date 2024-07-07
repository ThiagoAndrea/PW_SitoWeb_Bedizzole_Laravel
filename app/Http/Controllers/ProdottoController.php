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

    public function store(Request $request)
    {
        session_start();
        $dl = new DataLayer();
        $dl -> aggiungiProdotto($request);
        return redirect('admin/prodotti');
    }

    public function update(Request $request, $id_prodotto)
    {
        session_start();
        $dl = new DataLayer();
        $dl -> modificaProdotto($id_prodotto, $request);
        return redirect('admin/prodotti');
    }

    public function edit($id_prodotto)
    {
        session_start();
        $dl = new DataLayer();
        $prodotto = $dl -> trovaProdottoDaId($id_prodotto);
        $taglie = $dl -> elencaTaglie();
        $squadre = $dl -> elencaSquadre();
        if(isset($_SESSION['logged'])){
            return view('admin.modificaProdotto')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('prodotto', $prodotto)->with('squadre', $squadre)->with('taglie', $taglie);
        } else {
            return view('admin.modificaProdotto')->with('logged', false)->with('prodotto', $prodotto)->with('squadre', $squadre)->with('taglie', $taglie);
        }
    }

    public function create(){
        session_start();
        $dl = new DataLayer();
        $squadre = $dl -> elencaSquadre();
        $taglie = $dl -> elencaTaglie();
        if(isset($_SESSION['logged'])){
            return view('admin.modificaProdotto')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('squadre', $squadre)->with('taglie', $taglie);
        } else {
            return view('admin.modificaProdotto')->with('logged', false)->with('squadre', $squadre)->with('taglie', $taglie);
        }
    }

    public function destroy($id_prodotto)
    {
        session_start();
        $dl = new DataLayer();
        $dl -> eliminaNotizia($id_prodotto);
        return redirect('admin/prodotti');
    }

    
}
