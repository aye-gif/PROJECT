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
            $table->string('ref_info_adresse');
            $table->string('nom_client');
            $table->string('prenom_client');
            $table->mediumText('adresse');
            $table->string('telephone');
            $table->string('ville');
            $table->string('commune');
            $table->string('mode_livraison');
            $table->string('methode_paiement');
            $table->string('statut')->default('etape1');
            $table->longtext('cart');
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
        Schema::dropIfExists('commandes');
    }
};
