<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordine extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'ordini';
    protected $primaryKey = 'id_ordine';
 
    protected $fillable = ['id_user', 'data_ordine', 'lista_prodotti', 'prezzo_totale'];
 
    public function utente(){
     return $this->belongsTo(Utente::class, 'id_user');
    }

    public function dettagli(){
     return $this->hasMany(Dettaglio::class, 'id_ordine');
    }

 
}
