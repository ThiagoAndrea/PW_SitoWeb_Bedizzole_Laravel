<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;
use Illuminate\Support\Facades\Redirect;

class SquadraController extends Controller
{
   
    public function show($id_squadra)
    {
        session()->start();
        $dl = new DataLayer();
        $listaGiocatori = $dl -> trovaGiocatoriDaSquadra($id_squadra);
        $squadre = $dl -> elencaSquadre();
        $squadra = $dl -> trovaSquadraDaId($id_squadra);
        if($squadra == null){
            return redirect()->route('notFound');
        }
        $listaAllenatori = $dl -> trovaAllenatoriDaSquadra($id_squadra);
        if (isset ($_SESSION['logged'])) {
            return view('rose.squadre')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('listaGiocatori', $listaGiocatori)->with('squadra', $squadra)->with('squadre', $squadre)->with('listaAllenatori', $listaAllenatori);
        } else {
            return view('rose.squadre')->with('logged', false)->with('listaGiocatori', $listaGiocatori)->with('squadra', $squadra)->with('squadre', $squadre)->with('listaAllenatori', $listaAllenatori);
        }

    }


}
