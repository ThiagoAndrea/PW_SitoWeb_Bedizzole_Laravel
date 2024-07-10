<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;

class ErroriController extends Controller
{
    public function forbidden()
    {
        $dl = new DataLayer();
        $dl->elencaSquadre();
        return view('errori.403')->with('squadre', $dl->elencaSquadre());
    }

    public function notFound()
    {
        $dl = new DataLayer();
        $dl->elencaSquadre();
        return view('errori.404')->with('squadre', $dl->elencaSquadre());
    }

    public function internalServerError()
    {
        $dl = new DataLayer();
        $dl->elencaSquadre();
        return view('errori.500')->with('squadre', $dl->elencaSquadre());
    }
}
