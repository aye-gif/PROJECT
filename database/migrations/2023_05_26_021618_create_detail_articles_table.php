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
        Schema::create('detail_articles', function (Blueprint $table) {
            $table->id();
            $table->string('ref_detail_article');
            $table->string('libelle1');
            $table->string('valeur1');
            $table->string('libelle2');
            $table->string('valeur2');
            $table->string('libelle3');
            $table->string('valeur3');
            $table->string('libelle4');
            $table->string('valeur4');
            $table->string('libelle5');
            $table->string('valeur5');
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
        Schema::dropIfExists('detail_articles');
    }
};
