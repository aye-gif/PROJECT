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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('ref_article');
            $table->string('Num_article');
            $table->foreignId('detail_id');
            $table->foreignId('categorie_id');
            $table->foreignId('marque_id');
            $table->foreignId('fournisseur_id');
            $table->string('type_article');
            $table->string('libelle_article');
            $table->string('image_article')->default('LOGO.png');
            $table->string('image2_article')->default('LOGO.png');
            $table->string('image3_article')->default('LOGO.png');
            $table->integer('prix');
            $table->integer('prix_2');
            $table->string('statut');
            $table->string('couleur_statut');
            $table->string('disponibilite');
            $table->timestamps();

            $table->foreign('detail_id')->references('id')->on('detail_articles');
            $table->foreign('categorie_id')->references('id')->on('categories');
            $table->foreign('marque_id')->references('id')->on('marques');
            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
