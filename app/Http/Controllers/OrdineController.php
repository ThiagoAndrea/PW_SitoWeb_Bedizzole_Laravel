<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrello;
use App\Models\DataLayer;
use App\Models\Dettaglio;

class OrdineController extends Controller
{
    public function checkout(){
        $dl = new DataLayer();
        $id_user = $_SESSION['loggedId'];
        $dl -> creaOrdine($id_user);
        $squadre = $dl->elencaSquadre();

        return view('carrello.ordineCompletato')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('squadre', $squadre);
    }

    public function index(){
        $dl = new DataLayer();
        $ordini = $dl->elencaOrdini();
        $squadre = $dl->elencaSquadre();
        return view('admin.visualizzaOrdini')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('ordini', $ordini)->with('squadre', $squadre);
    }

    public function ordineUtente(){
        $dl = new DataLayer();
        $id_user = $_SESSION['loggedId'];
        $ordini = $dl->elencaOrdiniDaUtente($id_user);
        $squadre = $dl->elencaSquadre();
        return view('carrello.recapOrdini')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('ordini', $ordini)->with('squadre', $squadre);
    }
}
