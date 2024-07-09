<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;

class AllenatoreController extends Controller
{
    public function index()
    {
        $dl = new DataLayer();
        $allenatori = $dl->elencaAllenatori();
        $squadre = $dl->elencaSquadre();
        return view('admin.gestioneAllenatori')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('allenatori', $allenatori)->with('squadre', $squadre);
    }

    public function edit($id_allenatore)
    {

        $dl = new DataLayer();
        $allenatore = $dl->trovaAllenatoreDaId($id_allenatore);
        $squadre = $dl->elencaSquadre();

        return view('admin.modificaAllenatore')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('allenatore', $allenatore)->with('squadre', $squadre);

    }

    public function create()
    {

        $dl = new DataLayer();
        $squadre = $dl->elencaSquadre();
        return view('admin.modificaAllenatore')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('squadre', $squadre);

    }

    public function destroy($id_allenatore)
    {
        $dl = new DataLayer();
        $dl->eliminaAllenatore($id_allenatore);
        return redirect('admin/allenatori');
    }

    public function store(Request $request)
    {
        $dl = new DataLayer();
        $dl->aggiungiAllenatore($request);
        return redirect('admin/allenatori');
    }

    public function update(Request $request, $id_allenatore)
    {
        $dl = new DataLayer();
        $dl->modificaAllenatore($id_allenatore, $request);
        return redirect('admin/allenatori');
    }
}
