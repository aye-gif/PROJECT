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
            $table->string('ref_info_adresse');
            $table->string('ref_client');
            $table->integer('telephone2');
            $table->string('adresse');
            $table->string('ville');
            $table->string('commune');
            $table->string('quartier');
            $table->string('info_supplementaire');
            $table->string('sauvegarde')->default('non');
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
