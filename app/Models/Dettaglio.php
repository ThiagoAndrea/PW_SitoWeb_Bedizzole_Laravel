<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dettaglio extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'dettagli_carrello';

    protected $primaryKey = 'id_dettaglio';

    protected $fillable = ['id_carrello', 'id_prodotto', 'quantita', 'id_taglia'];

    public function utente()
    {
        return $this->belongsTo(Carrello::class, 'id_carrello');
    }

    public function prodotto()
    {
        return $this->belongsTo(Prodotto::class, 'id_prodotto');
    }

    public function taglia()
    {
        return $this->belongsTo(Taglia::class, 'id_taglia');
    }



}
