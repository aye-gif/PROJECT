<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class Insert_Mode_Livraison extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('mode_livraisons')->insert([
            [
                'ref_mode_livraison' => 'MODE1',
                'libelle_mode_livraison' => 'domicile',
                'valeur_mode_livraison' => '1500',
                // Ajoutez d'autres champs et valeurs ici
            ],
            [
                'ref_mode_livraison' => 'MODE2',
                'libelle_mode_livraison' => 'magasin',
                'valeur_mode_livraison' => '0',
                // Ajoutez d'autres champs et valeurs ici
             ]
    ]);
    }
}
