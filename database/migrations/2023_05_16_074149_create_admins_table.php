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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('nom');
            $table->string('prenoms');
            $table->string('email');
            $table->string('password');
            $table->timestamps();
        });

        // Insérer des valeurs dès la création de la table
        DB::table('admins')->insert([
            ['image' => 'LOGO.png', 'nom' => 'Arnold', 'prenoms' => 'Aye aurelien', 'email' => 'ayearnoldaurelienokaingne@gmail.com', 'password' => bcrypt('Prisca@123'),'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
};
