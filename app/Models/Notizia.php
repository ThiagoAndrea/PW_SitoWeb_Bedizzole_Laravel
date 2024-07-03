<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notizia extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'notizie';
    protected $primaryKey = 'id_notizia';

    protected $fillable = ['data', 'titolo', 'testo', 'foto'];

    



}
