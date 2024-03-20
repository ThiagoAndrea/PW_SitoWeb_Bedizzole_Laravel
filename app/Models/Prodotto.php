<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodotto extends Model
{
    use HasFactory;

   protected $table = 'prodotti';
   protected $primaryKey = 'id_prodotto';

   protected $fillable = ['descrizione', 'foto', 'prezzo'];

   public function taglie(){
    return $this->belongsToMany(Taglia::class, 'TaglieProdotto', 'id_taglia', 'id_prodotto');
   }

   public function ordini(){
    return $this->hasMany(Ordine::class,'id_prodotto');
   }


}
