<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordine extends Model
{
    use HasFactory;

    protected $table = 'ordini';
    protected $primaryKey = 'id_ordine';
 
    protected $fillable = ['id_prodotto', 'id_taglia', 'quantità'];
 
    public function prodotto(){
     return $this->belongsTo(Prodotto::class,'id_prodotto');
    }
 
    public function taglia(){
        return $this->belongsTo(Taglia::class,'id_taglia');
    }

    public function carrello(){
        return $this->belongsTo(Carrello::class,'id_carrello');
    }
 
}
