<?php

namespace App\Models;

use App\Models\Allenatore;
use App\Models\Carrello;
use App\Models\Giocatore;
use App\Models\Prodotto;
use App\Models\Squadra;
use App\Models\Taglia;
use App\Models\User;
use App\Models\Utente;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataLayer extends Model
{
    use HasFactory;

    public function elencaGiocatori(){
        $giocatori = Giocatore::all();
        return $giocatori;
    }

    public function elencaSquadre(){
        $squadre = Squadra::all();
        return $squadre;
    }

    public function elencaAllenatori(){
        $allenatori = Allenatore::all();
        return $allenatori;
    }

    public function eliminaGiocatore($id){
        $giocatore = Giocatore::find($id);
        $giocatore->delete();
    }

    public function modificaGiocatore($id, $nome, $cognome, $data_di_nascita, $id_squadra, $ruolo, $foto){
        $giocatore = Giocatore::find($id);
        $giocatore->nome = $nome;
        $giocatore->cognome = $cognome;
        $giocatore->data_di_nascita = $data_di_nascita;
        $giocatore->id_squadra = $id_squadra;
        $giocatore->ruolo = $ruolo;
        $giocatore->foto = $foto;
        $giocatore->save();
    }

    public function aggiungiGiocatore($nome, $cognome, $data_di_nascita, $id_squadra, $ruolo, $foto){
        $giocatore = new Giocatore;
        $giocatore->nome = $nome;
        $giocatore->cognome = $cognome;
        $giocatore->data_di_nascita = $data_di_nascita;
        $giocatore->id_squadra = $id_squadra;
        $giocatore->ruolo = $ruolo;
        $giocatore->foto = $foto;
        $giocatore->save();
    }

    public function elencaProdotti(){
        $prodotti = Prodotto::all();
        return $prodotti;
    }

    public function trovaGiocatoreDaId($id){
        $giocatore = Giocatore::find($id);
        return $giocatore;
    }

    public function trovaGiocatoriDaSquadra($id_squadra){
        $giocatori = Giocatore::where('id_squadra', $id_squadra)->get();
        return $giocatori;
    }

    public function mostraCarrello($id_user){
        $carrello = Carrello::where('id_user', $id_user)->get();
        return $carrello;
    }

    public function trovaTaglia($id_taglia){
        $taglia = Taglia::find($id_taglia);
        return $taglia;
    }

    public function elencaTaglieDaProdotto($id_prodotto){
        $taglie = Taglia::where('id_prodotto', $id_prodotto)->get();
        return $taglie;
    }

    public function aggiungiProdotto($descrizione, $foto, $prezzo){
        $prodotto = new Prodotto;
        $prodotto->descrizione = $descrizione;
        $prodotto->foto = $foto;
        $prodotto->prezzo = $prezzo;
        $prodotto->save();
    }

    public function aggiungiTagliaProdotto($id_prodotto, $taglie){
        foreach($taglie as $taglia){
            $taglia_prodotto = new Taglia;
            $taglia_prodotto->id_prodotto = $id_prodotto;
            $taglia_prodotto->taglia = $taglia;
            $taglia_prodotto->save();
        }
    }

    public function modificaProdotto($id, $descrizione, $foto, $prezzo){
        $prodotto = Prodotto::find($id);
        $prodotto->descrizione = $descrizione;
        $prodotto->foto = $foto;
        $prodotto->prezzo = $prezzo;
        $prodotto->save();
    }

    public function trovaProdottoDaId($id){
        $prodotto = Prodotto::find($id);
        return $prodotto;
    }

    public function elencaTaglie(){
        $taglie = Taglia::all();
        return $taglie;
    }

    public function trovaTagliaDaProdotto($id_taglia, $id_prodotto){
        $taglia = Taglia::where('id_taglia', $id_taglia)->where('id_prodotto', $id_prodotto)->first();
        return $taglia;
    }

    public function modificaTaglieProdotto($id_prodotto, $nuoveTaglie){
        $taglie = Taglia::where('id_prodotto', $id_prodotto)->get();
        foreach($taglie as $taglia){
            $taglia->delete();
        }
        foreach($nuoveTaglie as $taglia){
            $taglia_prodotto = new Taglia;
            $taglia_prodotto->id_prodotto = $id_prodotto;
            $taglia_prodotto->taglia = $taglia;
            $taglia_prodotto->save();
        }
    }

    public function utenteValido($email, $password){
        $utente = User::where('email', $email)->get('password');
        if(count($utente) == 0)
        return false;
        else {
            return (md5($password)==($utente[0]->password));
        }
    }


    public function aggiungiUtente($email, $password, $nome, $cognome){
        $utente = new User;
        $utente->email = $email;
        $utente->password = md5($password);
        $utente->nome = $nome;
        $utente->cognome = $cognome;
        $utente->save();
    }

    public function trovaIdUtenteDaEmail($email){
        $utente = User::where('email', $email)->first();
        return $utente->id;
    }
}
