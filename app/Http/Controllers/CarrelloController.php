<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;
use App\Models\Dettaglio;

class CarrelloController extends Controller
{
    public function show(){
        session_start();
        if(isset($_SESSION['logged'])){
            $dl = new DataLayer();
            $carrello = $dl -> trovaCarrelloDaIdUtente($_SESSION['loggedId']);
            $dettagli = $dl -> elencaDettagliCarrello($carrello->id_carrello);
            $squadre = $dl -> elencaSquadre();
            return view('carrello.carrello')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('dettagli', $dettagli)->with('squadre', $squadre);
        } else {
            redirect('user/login');
        }
    }

    public function destroy($id_dettaglio){
        session_start();
        $dl = new DataLayer();
        $dl -> eliminaDettaglio($id_dettaglio);
        return redirect('carrello');
    }
}
