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
        Schema::create('mode_livraisons', function (Blueprint $table) {
            $table->id();
            $table->string('ref_mode_livraison');
            $table->string('libelle_mode_livraison')->default('magasin');
            $table->string('valeur_mode_livraison');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mode_livraisons');
    }
};
