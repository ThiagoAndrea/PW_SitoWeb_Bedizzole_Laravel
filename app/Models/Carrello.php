<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrello extends Model
{
    use HasFactory;

    protected $table = 'carrelli';

    protected $primaryKey = 'id_carrello';

    protected $fillable = ['id_user'];

    public function utente()
    {
        return $this->belongsTo(Utente::class, 'id_user');
    }


}
