<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giocatore extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'giocatori';
   protected $primaryKey = 'id_giocatore';

   protected $fillable = ['nome', 'cognome', 'data_di_nascita', 'id_squadra', 'ruolo', 'foto'];

   public function squadre(){
    return $this->belongsTo(Squadra::class, 'id_squadra');
   }
}
