<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('squadre', function(Blueprint $table) {
            $table->increments('id_squadra');
            $table->string('nome');
        });

        Schema::create('allenatori', function(Blueprint $table) {
            $table->increments('id_allenatore');
            $table->string('nome');
            $table->string('cognome');
            $table->date('data_di_nascita');
            $table->string('foto')->nullable();
        });

        Schema::create('allenatori_squadre', function(Blueprint $table){
            $table->integer('id_allenatore')->unsigned();
            $table->integer('id_squadra')->unsigned();
            $table->foreign('id_allenatore')->references('id_allenatore')->on('allenatori')->onDelete('cascade');
            $table->foreign('id_squadra')->references('id_squadra')->on('squadre')->onDelete('cascade');
        });

        Schema::create('giocatori', function(Blueprint $table) {
            $table->increments('id_giocatore');
            $table->string('nome');
            $table->string('cognome');
            $table->date('data_di_nascita');
            $table->string('foto')->nullable();
            $table->integer('id_squadra')->unsigned();
            $table->enum('ruolo', ['Portiere', 'Difensore', 'Centrocampista', 'Attaccante']);
            $table->foreign('id_squadra')->references('id_squadra')->on('squadre')->onDelete('cascade');
        });

        Schema::create('prodotti' , function(Blueprint $table) {
            $table->increments('id_prodotto');
            $table->string('descrizione');
            $table->float('prezzo');
            $table->string('foto')->nullable();
        });

        Schema::create('taglie', function(Blueprint $table) {
            $table->increments('id_taglia');
            $table->string('taglia');
        });

        Schema::create('taglie_prodotti', function(Blueprint $table) {
            $table->integer('id_prodotto')->unsigned();
            $table->integer('id_taglia')->unsigned();
            $table->foreign('id_prodotto')->references('id_prodotto')->on('prodotti')->onDelete('cascade');
            $table->foreign('id_taglia')->references('id_taglia')->on('taglie')->onDelete('cascade');
        });

        Schema::create('carrelli', function(Blueprint $table) {
            $table->increments('id_carrello');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id_user')->on('utenti')->onDelete('cascade');
        });

        Schema::create('ordini', function(Blueprint $table) {
            $table->increments('id_ordine');
            $table->integer('id_carrello')->unsigned();
            $table->integer('id_prodotto')->unsigned();
            $table->integer('id_taglia')->unsigned();
            $table->integer('quantita');
            $table->foreign('id_carrello')->references('id_carrello')->on('carrelli')->onDelete('cascade');
            $table->foreign('id_prodotto')->references('id_prodotto')->on('prodotti')->onDelete('cascade');
            $table->foreign('id_taglia')->references('id_taglia')->on('taglie')->onDelete('cascade');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('utenti', function(Blueprint $table) {
            $table->dropForeign(['id_carrello']);
        });

        Schema::dropIfExists('allenatori_squadre');
        Schema::dropIfExists('giocatori');
        Schema::dropIfExists('prodotti');
        Schema::dropIfExists('squadre');
        Schema::dropIfExists('taglie');
        Schema::dropIfExists('taglie_prodotti');
        Schema::dropIfExists('ordini');
        Schema::dropIfExists('carrelli');
        Schema::dropIfExists('allenatori');
    }
};
