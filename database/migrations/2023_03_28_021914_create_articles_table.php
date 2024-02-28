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
            $table->string('ref_detail');
            $table->string('ref_categorie');
            $table->string('ref_marque');
            $table->string('ref_fournisseur');
            $table->string('ref_client');
            $table->string('type_article');
            $table->mediumText('libelle_article');
            $table->string('image_article');
            $table->string('image2_article');
            $table->string('image3_article');
            $table->integer('prix');
            $table->integer('prix_2');
            $table->string('statut');
            $table->string('couleur_statut');
            $table->string('disponibilite');
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
        Schema::dropIfExists('articles');
    }
};
