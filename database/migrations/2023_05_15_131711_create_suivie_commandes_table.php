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
        Schema::create('suivie_commandes', function (Blueprint $table) {
            $table->id();
            $table->string('ref_suivie_commande');
            $table->string('ref_commande');
            $table->string('methode_livraison');
            $table->string('statut');
            $table->string('date_livraison');
            $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suivie_commandes');
    }
};
