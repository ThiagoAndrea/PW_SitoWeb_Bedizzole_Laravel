<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;

class AllenatoreController extends Controller
{
    public function index(){
        session_start();
        $dl = new DataLayer();
        $allenatori = $dl -> elencaAllenatori();
        $squadre = $dl -> elencaSquadre();
        if(isset($_SESSION['logged'])){
            return view('admin.gestioneAllenatori')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('allenatori', $allenatori)->with('squadre', $squadre);
        } else {
            return view('admin.gestioneAllenatori')->with('logged', false)->with('allenatori', $allenatori)->with('squadre', $squadre);
        }
    }

    public function edit($id_allenatore){
        session_start();
        $dl = new DataLayer();
        $allenatore = $dl -> trovaAllenatoreDaId($id_allenatore);
        $squadre = $dl -> elencaSquadre();
        if(isset($_SESSION['logged'])){
            return view('admin.modificaAllenatore')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('allenatore', $allenatore)->with('squadre', $squadre);
        } else {
            return view('admin.modificaAllenatore')->with('logged', false)->with('allenatore', $allenatore)->with('squadre', $squadre);
        }
    }

    public function create(){
        session_start();
        $dl = new DataLayer();
        $squadre = $dl -> elencaSquadre();
        if(isset($_SESSION['logged'])){
            return view('admin.modificaAllenatore')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('squadre', $squadre);
        } else {
            return view('admin.modificaAllenatore')->with('logged', false)->with('squadre', $squadre);
        }
    }

    public function destroy($id_allenatore){
        session_start();
        $dl = new DataLayer();
        $dl -> eliminaAllenatore($id_allenatore);
        return redirect('admin/allenatori');
    }

    public function store(Request $request){
        session_start();
        $dl = new DataLayer();
        $dl -> aggiungiAllenatore($request);
        return redirect('admin/allenatori');
    }

    public function update(Request $request, $id_allenatore){
        session_start();
        $dl = new DataLayer();
        $dl -> modificaAllenatore($id_allenatore, $request);
        return redirect('admin/allenatori');
    }
}
