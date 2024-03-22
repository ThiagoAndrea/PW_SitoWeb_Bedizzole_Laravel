<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allenatore extends Model
{
   use HasFactory;

   public $timestamps = false;
   protected $table = 'allenatori';
   protected $primaryKey = 'id_allenatore';

   protected $fillable = ['nome', 'cognome', 'data_di_nascita', 'foto'];

   public function squadre(){
    return $this->belongsToMany(Squadra::class, 'AllenatoreSquadre', 'id_allenatore', 'id_squadra');
   }


}
