<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;
use App\Models\Article;

class HeaderControleur extends Controller
{
    //
    public function header(){
         $affiche_categorie = DB::table('articles')->join('categories', 'articles.ref_categorie', '=', 'categories.ref_categorie')->where('categories.libelle_categorie', '=', 'VETEMENT FEMME')->get();
        
         return view('home-fashion-store-v2',[
             'affiche_categorie' => $affiche_categorie,
                 ]
             );
    }
}
