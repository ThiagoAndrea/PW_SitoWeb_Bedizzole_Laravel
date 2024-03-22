<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utente extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'utenti';
    protected $primaryKey = 'id_user';
 
    protected $fillable = ['email', 'password', 'nome', 'cognome', 'id_carrello'];
 
    public function carrello(){
     return $this->hasOne(Carrello::class, 'id_carrello');
    }
 
}
