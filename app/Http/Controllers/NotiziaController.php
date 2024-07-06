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
        $notizie = $dl -> elencaNotizie();
        $squadre = $dl -> elencaSquadre();
        if(isset($_SESSION['logged'])){
            return view('notizie.notizie')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('notizie', $notizie)->with('squadre', $squadre);
        } else {
            return view('notizie.notizie')->with('logged', false)->with('notizie', $notizie)->with('squadre', $squadre);
        }
    }

    public function show($id_notizia)
    {
        session_start();
        $dl = new DataLayer();
        $notizia = $dl -> trovaNotiziaDaId($id_notizia);
        $notizie = $dl -> elencaNotizie();
        $squadre = $dl -> elencaSquadre();
        if(isset($_SESSION['logged'])){
            return view('notizie.dettaglioNotizia')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('notizia', $notizia)->with('squadre', $squadre)->with('notizie', $notizie);
        } else {
            return view('notizie.dettaglioNotizia')->with('logged', false)->with('notizia', $notizia)->with('squadre', $squadre)->with('notizie', $notizie);
        }
    }

    public function getGiornalista()
    {
        session_start();
        $dl = new DataLayer();
        $notizie = $dl -> elencaNotizie();
        $squadre = $dl -> elencaSquadre();
        if(isset($_SESSION['logged'])){
            return view('notizie.giornalista')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('notizie', $notizie)->with('squadre', $squadre);
        } else {
            return view('notizie.giornalista')->with('logged', false)->with('notizie', $notizie)->with('squadre', $squadre);
        }
    }
}
