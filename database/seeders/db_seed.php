<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Squadra;
use App\Models\Giocatore;
use App\Models\Taglia;
use App\Models\Utente;
use App\Models\DataLayer;
use App\Models\Notizia;
use App\Models\Prodotto;
use App\Models\Allenatore;
use App\Models\Carrello;
use App\Models\Dettaglio;

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

        Utente::create([
            'nome' => 'Utente',
            'cognome' => 'Bianchi',
            'password' => md5('utente'),
            'email' => 'utente@gmail.com',
        ]);

        Utente::create([
            'nome' => 'Giornalista',
            'cognome' => 'Rossi',
            'password' => md5('giornalista'),
            'email' => 'giornalista@gmail.com',
            'privilegi' => 1,
        ]);


        Utente::create([
            'nome' => 'Admin',
            'cognome' => 'Verdi',
            'password' => md5('admin'),
            'email' => 'admin@gmail.com',
            'privilegi' => 2,
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

        foreach ($squadre as $squadra) {
            Giocatore::factory()->count(rand(10, 20))->create(['id_squadra' => $squadra->id_squadra]);
        }

        Notizia::factory()->count(10)->create();
        Prodotto::factory()->count(10)->create();


        $prodotti = Prodotto::all();
        foreach ($prodotti as $prodotto) {
            $numeroTaglie = rand(4, 7);
            $taglie = Taglia::inRandomOrder()->limit($numeroTaglie)->get();
            foreach ($taglie as $taglia) {
                if (Taglia::find($taglia->id_taglia)) {
                    $prodotto->taglie()->attach($taglia);
                }
            }
        }

        Allenatore::factory()->count(10)->create();

        $allenatori = Allenatore::all();
        foreach ($allenatori as $allenatore) {
            if ($allenatore->squadre()->count() == 0) {
                $squadra = Squadra::inRandomOrder()->first();
                $allenatore->squadre()->attach($squadra);
            }
        }

        $squadre = Squadra::all();
        foreach ($squadre as $squadra) {
            $allenatori = Allenatore::inRandomOrder()->limit(rand(1, 2))->get();
            foreach ($allenatori as $allenatore) {
                if (Allenatore::find($allenatore->id_allenatore)) {
                    $allenatore->squadre()->attach($squadra);
                }
            }
        }

        $utenti = Utente::where('privilegi', 0)->get();
        foreach ($utenti as $utente) {
            Carrello::create([
                'id_user' => $utente->id_user,
            ]);
        }

        $carrelli = Carrello::all();
        foreach($carrelli as $carrello){
            $prodotti = Prodotto::inRandomOrder()->limit(rand(1, 5))->get();
            foreach($prodotti as $prodotto){
                $taglia = Taglia::inRandomOrder()->first();
                Dettaglio::create([
                    'id_carrello' => $carrello->id_carrello,
                    'id_prodotto' => $prodotto->id_prodotto,
                    'quantita' => rand(1, 5),
                    'id_taglia' => $taglia->id_taglia,
                ]);
            }
        }




    }
}
