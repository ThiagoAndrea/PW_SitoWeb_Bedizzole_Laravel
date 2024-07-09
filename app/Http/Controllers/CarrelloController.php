<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;
use App\Models\Dettaglio;

class CarrelloController extends Controller
{
    public function show()
    {
        $dl = new DataLayer();
        $carrello = $dl->trovaCarrelloDaIdUtente($_SESSION['loggedId']);
        $dettagli = $dl->elencaDettagliCarrello($carrello->id_carrello);
        $totale = 0;
        $prezziDettagli=[];
        foreach ($dettagli as $dettaglio){
            $prodotto = $dl->trovaProdottoDaId($dettaglio->id_prodotto);
            $prezzo = $prodotto->prezzo;
            $quantita = $dettaglio->quantita;
            $prezzoDettaglio = $prezzo * $quantita;
            $totale += $prezzoDettaglio;

            $prezziDettagli[$dettaglio->id_dettaglio] = $prezzoDettaglio;
        }
    

        $squadre = $dl->elencaSquadre();
        return view('carrello.carrello')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('dettagli', $dettagli)->with('squadre', $squadre)->with('prezzoTotale', $totale)->with('prezziDettagli', $prezziDettagli);

    }

    public function destroy($id_dettaglio)
    {
        $dl = new DataLayer();
        $dl->eliminaDettaglio($id_dettaglio);
        return redirect('carrello');
    }
}
