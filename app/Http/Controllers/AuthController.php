<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function getLogin()
    {
        $dl = new DataLayer();
        $squadre = $dl->elencaSquadre();
        return view('auth.login')->with('squadre', $squadre);
    }

    public function postLogin(Request $request)
    {
       session_start();
       $dl = new DataLayer();
       $nome_utente = $dl->utenteValido($request->input('email'), $request->input('password'));
       if($nome_utente != null){
        $_SESSION['logged']=true;
        $_SESSION['loggedName'] = $nome_utente;
        return Redirect::to(route('home'));

    } else
        return 'error';
    }


    public function getRegistration()
    {
        $dl = new DataLayer();
        $squadre = $dl->elencaSquadre();
        return view('auth.registration')->with('squadre', $squadre);
    }

    public function postRegistration(Request $request)
    {
        $dl = new DataLayer();
        $dl -> aggiungiUtente($request->input('email'), $request->input('password'), $request->input('nome'), $request->input('cognome'));
        return Redirect::to(route('user.login'));        
    }

    public function getLogout()
    {
        session_start();
        session_destroy();
        return Redirect::to(route('home'));
    }
}
