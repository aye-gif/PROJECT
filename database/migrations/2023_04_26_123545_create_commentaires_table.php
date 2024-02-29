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
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id();
            $table->string('ref_commentaire');
            $table->string('ref_article');
            $table->string('nom');
            $table->string('email');
            $table->string('etoile');
            $table->mediumText('commentaire');
            $table->string('date');
            $table->integer('like_comment')->nullable();
            $table->integer('dislike_comment')->nullable();
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
        Schema::dropIfExists('commentaires');
    }
};
