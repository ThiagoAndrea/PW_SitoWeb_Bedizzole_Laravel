<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taglia extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'taglie';
    protected $primaryKey = 'id_taglia';
 
    protected $fillable = ['taglia'];
 
    public function prodotti(){
     return $this->belongsToMany(Prodotto::class, 'taglie_prodotti', 'id_taglie', 'id_prodotti');
    }

    public function dettagli(){
        return $this->hasMany(Dettaglio::class, 'id_taglia');
    }
    
 
 
}
