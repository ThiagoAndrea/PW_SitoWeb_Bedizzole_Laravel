<?php

namespace App\Http\Controllers;

use App\Models\DataLayer;

use Illuminate\Http\Request;

class NotiziaController extends Controller
{
    public function index()
    {
        session_start();
        $dl = new DataLayer();
        $notizie = $dl->elencaNotizie();
        $squadre = $dl->elencaSquadre();
        if (isset($_SESSION['logged'])) {
            return view('notizie.notizie')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('notizie', $notizie)->with('squadre', $squadre);
        } else {
            return view('notizie.notizie')->with('logged', false)->with('notizie', $notizie)->with('squadre', $squadre);
        }
    }

    public function show($id_notizia)
    {
        session_start();
        $dl = new DataLayer();
        $notizia = $dl->trovaNotiziaDaId($id_notizia);
        $notizie = $dl->elencaNotizie();
        $squadre = $dl->elencaSquadre();
        if ($notizia == null) {
            return redirect()->route('notFound');
        }
        if (isset($_SESSION['logged'])) {
            return view('notizie.dettaglioNotizia')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('notizia', $notizia)->with('squadre', $squadre)->with('notizie', $notizie);
        } else {
            return view('notizie.dettaglioNotizia')->with('logged', false)->with('notizia', $notizia)->with('squadre', $squadre)->with('notizie', $notizie);
        }
    }

    public function getGiornalista()
    {

        $dl = new DataLayer();
        $notizie = $dl->elencaNotizie();
        $squadre = $dl->elencaSquadre();

        return view('notizie.giornalista')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('notizie', $notizie)->with('squadre', $squadre);
    }

    public function store(Request $request)
    {
        $dl = new DataLayer();
        $dl->aggiungiNotizia($request);
        return redirect('giornalista');
    }

    public function update(Request $request, $id_notizia)
    {
        $dl = new DataLayer();
        $dl->modificaNotizia($id_notizia, $request);
        return redirect('giornalista');
    }

    public function edit($id_notizia)
    {

        $dl = new DataLayer();
        $notizia = $dl->trovaNotiziaDaId($id_notizia);
        if ($notizia == null) {
            return redirect()->route('notFound');
        }
        $squadre = $dl->elencaSquadre();

        return view('notizie.modificaNotizia')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('notizia', $notizia)->with('squadre', $squadre);

    }

    public function create()
    {

        $dl = new DataLayer();
        $squadre = $dl->elencaSquadre();
        return view('notizie.modificaNotizia')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('squadre', $squadre);

    }

    public function destroy($id_notizia)
    {
        $dl = new DataLayer();
        $dl->eliminaNotizia($id_notizia);
        return redirect('giornalista');
    }
}
