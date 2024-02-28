<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\SuivieCommande;

class PagesModifieController extends Controller
{
    //
    public function ModifierSuivieCommande($id){

        // cette requete me permet d'afficher la table suivie commande
        $affiche_suivie_commande = DB::table('suivie_commandes')->where('id','=',$id)->get();

        return view('admin.PagesModifie.ModifieSuivieCommande',[
            'affiche_suivie_commande' => $affiche_suivie_commande
        ]);
    }
}
