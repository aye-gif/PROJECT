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
        Schema::create('info_adresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id');
            $table->string('ref_info_adresse');
            $table->integer('telephone2');
            $table->string('adresse');
            $table->string('ville');
            $table->string('commune');
            $table->string('quartier');
            $table->string('statut')->default('actuel');
            $table->string('info_supplementaire');
            $table->string('sauvegarde')->default('non');
            $table->timestamps();

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
        Schema::dropIfExists('info_adresses');
    }
};
