<?php

namespace App\Models;

use App\Models\Allenatore;
use App\Models\Carrello;
use App\Models\Giocatore;
use App\Models\Prodotto;
use App\Models\Squadra;
use App\Models\Taglia;
use App\Models\Dettaglio;
use App\Models\Utente;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataLayer extends Model
{
    use HasFactory;

    public function elencaGiocatori()
    {
        $giocatori = Giocatore::all();
        return $giocatori;
    }

    public function elencaSquadre()
    {
        $squadre = Squadra::all();
        return $squadre;
    }

    public function eliminaGiocatore($id)
    {
        $giocatore = Giocatore::find($id);
        $giocatore->delete();
    }

    public function modificaGiocatore($id, $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cognome' => 'required|string|max:255',
            'data_di_nascita' => 'required|date',
            'id_squadra' => 'required|integer',
            'ruolo' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $giocatore = Giocatore::find($id);
        $giocatore->nome = $request->nome;
        $giocatore->cognome = $request->cognome;
        $giocatore->data_di_nascita = $request->data_di_nascita;
        $giocatore->id_squadra = $request->id_squadra;
        $giocatore->ruolo = $request->ruolo;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/giocatori'), $filename);
            $giocatore->foto = $filename;
        }

        $giocatore->save();
    }

    public function aggiungiGiocatore(Request $request)
    {

        $request->validate([
            'nome' => 'required|string|max:255',
            'cognome' => 'required|string|max:255',
            'data_di_nascita' => 'required|date',
            'id_squadra' => 'required|integer',
            'ruolo' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $giocatore = new Giocatore;
        $giocatore->nome = $request->nome;
        $giocatore->cognome = $request->cognome;
        $giocatore->data_di_nascita = $request->data_di_nascita;
        $giocatore->id_squadra = $request->id_squadra;
        $giocatore->ruolo = $request->ruolo;

        if ($request->hasFile('foto')) {
            // Rimuove la vecchia foto se esiste
            if ($giocatore->foto && File::exists(public_path('img/giocatori/' . $giocatore->foto))) {
                File::delete(public_path('img/giocatori/' . $giocatore->foto));
            }
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/giocatori'), $filename);
            $giocatore->foto = $filename;
        }

        $giocatore->save();

    }

    public function elencaProdotti()
    {
        $prodotti = Prodotto::all();
        return $prodotti;
    }

    public function trovaGiocatoreDaId($id)
    {
        $giocatore = Giocatore::find($id);
        return $giocatore;
    }

    public function trovaGiocatoriDaSquadra($id_squadra)
    {
        $giocatori = Giocatore::where('id_squadra', $id_squadra)->get();
        return $giocatori;
    }

    public function trovaSquadraDaId($id_squadra)
    {
        $squadra = Squadra::find($id_squadra);
        return $squadra;
    }

    public function mostraCarrello($id_user)
    {
        $carrello = Carrello::where('id_user', $id_user)->get();
        return $carrello;
    }

    public function trovaTaglia($id_taglia)
    {
        $taglia = Taglia::find($id_taglia);
        return $taglia;
    }

    public function elencaTaglieDaProdotto($id_prodotto)
    {
        $prodotto = Prodotto::find($id_prodotto);
        if ($prodotto) {
            return $prodotto->taglie;
        }
        return collect();
    }

    public function aggiungiProdotto(Request $request)
    {
        $prodotto = new Prodotto;
        $prodotto->descrizione = $request->descrizione;
        $prodotto->prezzo = floatval($request->prezzo);

        if ($request->hasFile('foto')) {
            if ($prodotto->foto && File::exists(public_path('img/shop/' . $prodotto->foto))) {
                File::delete(public_path('img/notizie/' . $prodotto->foto));
            }
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/shop'), $filename);
            $prodotto->foto = $filename;
        }
        $prodotto->save();

        $taglie = $request->input('taglie');
        $prodotto->taglie()->attach($taglie);
    }


    public function modificaProdotto($id, $request)
    {
        $prodotto = Prodotto::find($id);
        $prodotto->descrizione = $request->descrizione;
        $prodotto->prezzo = $request->prezzo;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/shop'), $filename);
            $prodotto->foto = $filename;
        }

        $taglie_selezionate = $request->input('taglie', []);
        $prodotto->taglie()->detach();
        if (!empty($taglie_selezionate)) {
            $prodotto->taglie()->attach($taglie_selezionate);
        }
       
        $prodotto->save();
    }

    public function eliminaProdotto($id)
    {
        $prodotto = Prodotto::find($id);
        $prodotto->delete();
    }

    public function trovaProdottoDaId($id)
    {
        $prodotto = Prodotto::find($id);
        return $prodotto;
    }

    public function elencaTaglie()
    {
        $taglie = Taglia::all();
        return $taglie;
    }

    public function trovaTagliaDaProdotto($id_taglia, $id_prodotto)
    {
        $taglia = Taglia::where('id_taglia', $id_taglia)->where('id_prodotto', $id_prodotto)->first();
        return $taglia;
    }

    public function modificaTaglieProdotto($id_prodotto, $nuoveTaglie)
    {
        $taglie = Taglia::where('id_prodotto', $id_prodotto)->get();
        foreach ($taglie as $taglia) {
            $taglia->delete();
        }
        foreach ($nuoveTaglie as $taglia) {
            $taglia_prodotto = new Taglia;
            $taglia_prodotto->id_prodotto = $id_prodotto;
            $taglia_prodotto->taglia = $taglia;
            $taglia_prodotto->save();
        }
    }

    public function utenteValido($email, $password)
    {$utente = Utente::where('email', $email)->first(['password', 'nome']);
        if (!$utente) {
            return false;
        }
        if (md5($password) == $utente->password) {
            return $utente->nome;
        } else {
            return false;
        }
    }

    public function trovaIdUtente($email)
    {
        $utente = Utente::where('email', $email)->first();
        return $utente->id_user;
    }

    public function trovaUtente($email){
        $utente = Utente::where('email', $email)->first();
        return $utente;
    }

    public function trovaPrivilegi($email)
    {
        $utente = Utente::where('email', $email)->first();
        return $utente->privilegi;
    }


    public function aggiungiUtente($email, $password, $nome, $cognome)
    {
        $utente = new Utente;
        $utente->email = $email;
        $utente->password = md5($password);
        $utente->nome = $nome;
        $utente->cognome = $cognome;
        $utente->save();

        $carello = new Carrello;
        $carello->id_user = $utente->id_user;
        $carello->save();
    }

    public function trovaIdUtenteDaEmail($email)
    {
        $utente = Utente::where('email', $email)->first();
        return $utente->id_user;
    }

    //Funzioni per le notizie

    public function elencaNotizie()
    {
        $notizie = Notizia::orderBy('data', 'desc')->get(); // Ordina le notizie per data in ordine decrescente dalla più recente alla meno recente
        return $notizie;
    }

    public function trovaNotiziaDaId($id)
    {
        $notizia = Notizia::find($id);
        return $notizia;
    }

    public function aggiungiNotizia(Request $request)
    {

        $notizia = new Notizia;
        $notizia->titolo = $request->titolo;
        $notizia->testo = $request->testo;
        $notizia->data = $request->data;

        if ($request->hasFile('foto')) {
            if ($notizia->foto && File::exists(public_path('img/notizie/' . $notizia->foto))) {
                File::delete(public_path('img/notizie/' . $notizia->foto));
            }
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/notizie'), $filename);
            $notizia->foto = $filename;
        }

        $notizia->save();
    }

    public function modificaNotizia($id, $request)
    {

        $notizia = Notizia::find($id);
        $notizia->titolo = $request->titolo;
        $notizia->testo = $request->testo;
        $notizia->data = $request->data;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/notizie'), $filename);
            $notizia->foto = $filename;
        }

        $notizia->save();
    }

    public function eliminaNotizia($id)
    {
        $notizia = Notizia::find($id);
        $notizia->delete();
    }


    //Funzioni per allenatori
    public function elencaAllenatori()
    {
        $allenatori = Allenatore::all();
        return $allenatori;
    }

    public function eliminaAllenatore($id){
        $allenatore = Allenatore::find($id);
        $allenatore->delete();
    }

    public function modificaAllenatore($id, $request)
    {
        $allenatore = Allenatore::find($id);
        $allenatore->nome = $request->nome;
        $allenatore->cognome = $request->cognome;
        $allenatore->data_di_nascita = $request->data_di_nascita;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/allenatori'), $filename);
            $allenatore->foto = $filename;
        }
        $squadre_selezionate = $request->input('squadre', []);
        $allenatore->squadre()->detach();
        if (!empty($squadre_selezionate)) {
            $allenatore->squadre()->attach($squadre_selezionate);
        }
        $allenatore->save();
    }

    public function aggiungiAllenatore(Request $request)
    {
        $allenatore = new Allenatore;
        $allenatore->nome = $request->nome;
        $allenatore->cognome = $request->cognome;
        $allenatore->data_di_nascita = $request->data_di_nascita;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/allenatori'), $filename);
            $allenatore->foto = $filename;
        }

        $allenatore->save();
        $squadre = $request->input('squadre');
        $allenatore->squadre()->attach($squadre);
    }

    public function trovaAllenatoriDaSquadra($id_squadra)
    {
        $squadra = Squadra::find($id_squadra);
        $allenatori = $squadra->allenatori;
        return $allenatori;

    }

    public function trovaAllenatoreDaId($id)
    {
        $allenatore = Allenatore::find($id);
        return $allenatore;
    }

    public function trovaCarrelloDaIdUtente($id)
    {
        $carrello = Carrello::where('id_user', $id)->first();
        return $carrello;
    }

    public function elencaDettagliCarrello($id_carrello){
        $dettagli = Dettaglio::where('id_carrello', $id_carrello)->get();
        return $dettagli;
    }

    public function eliminaDettaglio($id){
        $dettaglio = Dettaglio::find($id);
        $dettaglio->delete();
    }

    public function modificaDettaglio($id, $request){
        $dettaglio = Dettaglio::find($id);
        $dettaglio->quantita = $request->quantita;
        $dettaglio->id_taglia = $request->id_taglia;
        $dettaglio->save();
    }

    public function aggiungiDettaglio($request){
        $dettaglio = new Dettaglio;
        $dettaglio->id_carrello = $request->id_carrello;
        $dettaglio->id_prodotto = $request->id_prodotto;
        $dettaglio->quantita = $request->quantita;
        $dettaglio->id_taglia = $request->id_taglia;
        $dettaglio->save();
    }



}

