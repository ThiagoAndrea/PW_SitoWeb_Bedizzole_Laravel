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
        $squadre = $dl->elencaSquadre();
        $prodotti = $dl->elencaProdotti();

        if (isset($_SESSION['logged'])) {
            return view('shop.shop')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('squadre', $squadre)->with('prodotti', $prodotti);
        } else {
            return view('shop.shop')->with('logged', false)->with('squadre', $squadre)->with('prodotti', $prodotti);
        }

    }

    public function index()
    {
        $dl = new DataLayer();
        $prodotti = $dl->elencaProdotti();
        $squadre = $dl->elencaSquadre();

        return view('admin.gestioneShop')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('prodotti', $prodotti)->with('squadre', $squadre);

    }

    public function store(Request $request)
    {

        $dl = new DataLayer();
        $dl->aggiungiProdotto($request);
        return redirect('admin/prodotti');
    }

    public function update(Request $request, $id_prodotto)
    {

        $dl = new DataLayer();
        $dl->modificaProdotto($id_prodotto, $request);
        return redirect('admin/prodotti');
    }

    public function edit($id_prodotto)
    {

        $dl = new DataLayer();
        $prodotto = $dl->trovaProdottoDaId($id_prodotto);
        if($prodotto == null)
            return redirect('notfound');
        $taglie = $dl->elencaTaglie();
        $squadre = $dl->elencaSquadre();

        return view('admin.modificaProdotto')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('prodotto', $prodotto)->with('squadre', $squadre)->with('taglie', $taglie);

    }

    public function create()
    {

        $dl = new DataLayer();
        $squadre = $dl->elencaSquadre();
        $taglie = $dl->elencaTaglie();

        return view('admin.modificaProdotto')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('squadre', $squadre)->with('taglie', $taglie);

    }

    public function destroy($id_prodotto)
    {

        $dl = new DataLayer();
        $dl->eliminaProdotto($id_prodotto);
        return redirect('admin/prodotti');
    }

    public function showCarrello()
    {

        $dl = new DataLayer();
        $prodotti = $dl->elencaProdotti();
        $squadre = $dl->elencaSquadre();
        return view('carrello.carrello')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('prodotti', $prodotti)->with('squadre', $squadre);

    }

}
