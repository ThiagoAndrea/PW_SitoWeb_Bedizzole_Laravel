<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;

class GiocatoreController extends Controller
{
    public function index()
    {
        $dl = new DataLayer();
        $squadre = $dl->elencaSquadre();
        $giocatoriPerSquadra = [];

        foreach ($squadre as $squadra) {
            $giocatori = $dl->trovaGiocatoriDaSquadra($squadra->id_squadra);
            $giocatoriPerSquadra[$squadra->id_squadra] = $giocatori;
        }

        return view('admin.gestioneRose')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('squadre', $squadre)->with('giocatoriPerSquadra', $giocatoriPerSquadra);


    }

    public function edit($id)
    {
        $dl = new DataLayer();
        $giocatore = $dl->trovaGiocatoreDaId($id);
        $squadre = $dl->elencaSquadre();

        if($giocatore == null)
            return redirect('notfound');

        return view('admin.modificaGiocatore')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('giocatore', $giocatore)->with('squadre', $squadre);

    }

    public function create()
    {

        $dl = new DataLayer();
        $squadre = $dl->elencaSquadre();

        return view('admin.modificaGiocatore')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('squadre', $squadre);

    }

    public function store(Request $request)
    {

        $dl = new DataLayer();
        $dl->aggiungiGiocatore($request);
        return redirect('admin/giocatori');
    }

    public function update(Request $request, $id)
    {

        $dl = new DataLayer();
        $dl->modificaGiocatore($id, $request);
        return redirect('admin/giocatori');
    }

    public function destroy($id)
    {

        $dl = new DataLayer();
        $dl->eliminaGiocatore($id);
        return redirect('admin/giocatori');
    }

    public function confirmDestroy($id)
    {

        $dl = new DataLayer();
        $giocatore = $dl->trovaGiocatoreDaId($id);
        $squadre = $dl->elencaSquadre();

        return view('admin.eliminaGiocatore')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('giocatore', $giocatore)->with('squadre', $squadre);
    }

}
