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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('ref_commande');
            $table->foreignId('info_adresse_id');
            $table->foreignId('client_id');
            $table->string('mode_livraison');
            $table->string('nombreJour');
            $table->string('reste');
            $table->string('methode_paiement');
            $table->string('statut')->default('etape1');
            $table->longtext('cart');
            $table->timestamps();

            $table->foreign('info_adresse_id')->references('id')->on('info_adresses');
            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandes');
    }
};
