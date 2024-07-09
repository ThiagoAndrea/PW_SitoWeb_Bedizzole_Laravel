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

        return view('carrello.carrello')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('squadre', $squadre);
    }
}
