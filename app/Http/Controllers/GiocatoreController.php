<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;

class GiocatoreController extends Controller
{
    public function index()
    {
        session_start();
        $dl = new DataLayer();
        $squadre = $dl -> elencaSquadre();
        $giocatoriPerSquadra=[];

        foreach ($squadre as $squadra) {
            $giocatori = $dl -> trovaGiocatoriDaSquadra($squadra->id_squadra);
            $giocatoriPerSquadra[$squadra->id_squadra] = $giocatori;
        }
        if(isset($_SESSION['logged'])){
            return view('admin.gestioneRose')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('squadre', $squadre)->with('giocatoriPerSquadra', $giocatoriPerSquadra);
        } else {
            return view('admin.gestioneRose')->with('logged', false)->with('squadre', $squadre)->with('giocatoriPerSquadra', $giocatoriPerSquadra);
        }
        
    }

    public function edit($id){
        session_start();
        $dl = new DataLayer();
        $giocatore = $dl -> trovaGiocatoreDaId($id);
        $squadre = $dl -> elencaSquadre();
        if(isset($_SESSION['logged'])){
            return view('admin.modificaGiocatore')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('giocatore', $giocatore)->with('squadre', $squadre);
        } else {
            return view('admin.modificaGiocatore')->with('logged', false)->with('giocatore', $giocatore)->with('squadre', $squadre);
        }
    }

    public function create(){
        session_start();
        $dl = new DataLayer();
        $squadre = $dl -> elencaSquadre();
        if(isset($_SESSION['logged'])){
            return view('admin.modificaGiocatore')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('squadre', $squadre);
        } else {
            return view('admin.modificaGiocatore')->with('logged', false)->with('squadre', $squadre);
        }
    }
                                                                                                                                                                                           
    public function store(Request $request){
        session_start();
        $dl = new DataLayer();
        $dl -> aggiungiGiocatore($request);
        return redirect('admin/giocatori');
    }

    public function update(Request $request, $id){
        session_start();
        $dl = new DataLayer();
        $dl -> modificaGiocatore($id, $request);
        return redirect('admin/giocatori');
    }

    public function destroy($id){
        session_start();
        $dl = new DataLayer();
        $dl -> eliminaGiocatore($id);
        return redirect('admin/giocatori');
    }

    public function confirmDestroy($id){
        session_start();
        $dl = new DataLayer();
        $giocatore = $dl -> trovaGiocatoreDaId($id);
        $squadre = $dl -> elencaSquadre();
        if(isset($_SESSION['logged']) && $giocatore != null){
            return view('admin.eliminaGiocatore')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('giocatore', $giocatore)->with('squadre', $squadre);
        } else {
            return view('admin.eliminaGiocatore')->with('logged', false)->with('giocatore', $giocatore)->with('squadre', $squadre);
        }
    }
    
}
