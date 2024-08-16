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
            $table->string('valeur_mode_livraison')->default('1500');
            $table->timestamps();
        });

        
        // Insérer des valeurs dès la création de la table
        DB::table('mode_livraisons')->insert([
            ['ref_mode_livraison' => 'LIVRAIS01', 'libelle_mode_livraison' => 'magasin', 'valeur_mode_livraison' => '0','created_at' => now(), 'updated_at' => now()],
            ['ref_mode_livraison' => 'LIVRAIS02','libelle_mode_livraison' => 'domicile', 'valeur_mode_livraison' => '1500', 'created_at' => now(), 'updated_at' => now()],
        ]);
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
