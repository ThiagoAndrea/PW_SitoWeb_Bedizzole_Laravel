<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodotto extends Model
{
    use HasFactory;

    public $timestamps = false;
   protected $table = 'prodotti';
   protected $primaryKey = 'id_prodotto';

   protected $fillable = ['descrizione', 'foto', 'prezzo'];

   public function taglie(){
    return $this->belongsToMany(Taglia::class, 'taglie_prodotti', 'id_prodotto', 'id_taglia');
   }

   public function dettagli(){
    return $this->hasMany(Dettaglio::class, 'id_prodotto');
   }



}
