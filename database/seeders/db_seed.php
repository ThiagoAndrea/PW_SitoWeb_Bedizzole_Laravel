<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\Squadra;
use  App\Models\Giocatore;
use  App\Models\Taglia;
use App\Models\Utente;
use App\Models\DataLayer;
use App\Models\Notizia;
use App\Models\Prodotto;

class db_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Utente::create([
            'nome' => 'Andrea',
            'cognome' => 'Paolini',
            'password' => md5('Paolini'),
            'email' => 'andpaolini@gmail.com',
        ]);

        Squadra::create([
            'nome' => 'Scuola calcio',
        ]);

        Squadra::create([
            'nome' => 'Piccoli amici U9',
        ]);

        Squadra::create([
            'nome' => 'Pulcini U10',
        ]);

        Squadra::create([
            'nome' => 'Pulcini U11',
        ]);

        Squadra::create([
            'nome' => 'Esordienti U12',
        ]);

        Squadra::create([
            'nome' => 'Esordienti U13',
        ]);

        Squadra::create([
            'nome' => 'Giovanissimi U14',
        ]);

        Taglia::create([
            'taglia' => 'XXXS',
        ]);

        Taglia::create([
            'taglia' => 'XXS',
        ]);

        Taglia::create([
            'taglia' => 'XS',
        ]);

        Taglia::create([
            'taglia' => 'S',
        ]);

        Taglia::create([
            'taglia' => 'M',
        ]);

        Taglia::create([
            'taglia' => 'L',
        ]);

        Taglia::create([
            'taglia' => 'XL',
        ]);

        
        $dl = new DataLayer();
        $squadre = $dl->elencaSquadre();

        foreach($squadre as $squadra){
            Giocatore::factory()->count(rand(10,20))->create(['id_squadra' => $squadra->id_squadra]);
        }

        Notizia::factory()->count(10)->create();
        Prodotto::factory()->count(10)->create()->each(function($prodotto) {
            // Selezionare un numero casuale di taglie (da 1 a 3)
            $numTaglie = rand(1, 3);

            // Recuperare un numero casuale di taglie e ottenere solo gli ID
            $taglieIds = Taglia::inRandomOrder()->limit($numTaglie)->pluck('id_taglia');

            // Associazione delle taglie al prodotto
            $prodotto->taglie()->attach($taglieIds);
        });


        
    }
}
