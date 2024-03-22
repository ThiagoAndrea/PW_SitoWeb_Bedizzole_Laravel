<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Squadra extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'squadre';
    protected $primaryKey = 'id_squadra';
 
    protected $fillable = ['nome'];
 
    public function allenatori(){
     return $this->belongsToMany(Allenatore::class, 'allenatori_squadre', 'id_allenatore', 'id_squadra');
    }

    public function giocatori(){
        return $this->hasMany(Giocatore::class, 'id_giocatore');
        }
 
 
}
