<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataLayer extends Model
{
    use HasFactory;

    public function elencaGiocatori(){
        $giocatori = Giocatore::all();
        return $giocatori;
    }
}
