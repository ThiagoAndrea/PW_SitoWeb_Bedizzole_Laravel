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
        return view('auth.login')->with('squadre', $squadre)->with('logged', false);
    }

    public function postLogin(Request $request)
    {
        session_start();
        $dl = new DataLayer();
        $nome_utente = $dl->utenteValido($request->input('email'), $request->input('password'));
        $utente = $dl->trovaUtente($request->input('email'));
        if ($utente != null) {
            $id_utente = $dl->trovaIdUtente($request->input('email'));
            if ($nome_utente != null) {
                $_SESSION['logged'] = true;
                $_SESSION['loggedName'] = $nome_utente;
                $_SESSION['loggedId'] = $id_utente;
                $_SESSION['privilegi'] = $dl->trovaPrivilegi($request->input('email'));
                return Redirect::to(route('home'))->with('logged', true)->with('loggedName', $nome_utente)->with('loggedId', $id_utente);

            } else
                return redirect()->back()->with('error', 'Email o password errati');
        } else {
            return redirect()->back()->with('error', 'Email o password errati');
        }
    }


    public function getRegistration()
    {
        $dl = new DataLayer();
        $squadre = $dl->elencaSquadre();
        return view('auth.registration')->with('squadre', $squadre)->with('logged', false);
    }

    public function postRegistration(Request $request)
    {
        session_start();
        $dl = new DataLayer();
        $dl->aggiungiUtente($request->input('email'), $request->input('password'), $request->input('nome'), $request->input('cognome'));
        $utente = $dl->trovaUtente($request->input('email'));
        $_SESSION['logged'] = true;
        $_SESSION['loggedName'] = $utente->nome;
        $_SESSION['loggedId'] = $utente->id_user;
        $_SESSION['privilegi'] = $dl->trovaPrivilegi($request->input('email'));
        $squadre = $dl->elencaSquadre();
        return Redirect::to(route('home'))->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('squadre', $squadre)->with('loggedId', $_SESSION['loggedId']);
    }

    public function getLogout()
    {
        session_start();
        session_destroy();
        return Redirect::to(route('home'));
    }

    public function checkEmailAjax(Request $request)
    {
        $dl = new DataLayer();
        $email = $request->input('email');
        $utente = $dl->trovaUtente($email);
        if ($utente != null)
            $response = array('found' => true);
        else
            $response = array('found' => false);

        return response()->json($response);
    }
}
