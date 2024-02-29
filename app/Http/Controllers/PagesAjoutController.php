<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\Fournisseur;
use App\Models\Commande;
use App\Models\Marque;
use App\Models\Detail_article;
use App\Models\Taille_article;

class PagesAjoutController extends Controller
{
    //
    public function NewCategorie(Request $request){


        $categorie = new Categorie();
        $categorie->ref_categorie = "CAT".substr($request->input('libelle_categorie'),0,2 ).substr($request->input('libelle_categorie'),-5,2 );
        $categorie->libelle_categorie = $request->input('libelle_categorie');
        $categorie->save();
 
        return back();

    }

    public function NewMarque(Request $request){


        $marque = new Marque();
        $marque->ref_marque = "MARQ".substr($request->input('libelle_marque'),0,2 );
        $marque->libelle_marque = $request->input('libelle_marque');
        $marque->save();
 
        return back();

    }

    public function NewFournisseur(Request $request){


        $fournisseur = new Fournisseur();
        $fournisseur->ref_detail_article = "FOURN".substr($request->input('libelle_Fournisseur'),0,2 );
        $fournisseur->libelle_fournisseur = $request->input('libelle_Fournisseur');
        $fournisseur->telephone = $request->input('telephone');
        $fournisseur->save();
 
        return back();

    }

    public function NewDetail(Request $request){


        $detail = new Detail_article();
        $detail->ref_detail_articles = $request->input('ref_detail_article');
        $detail->ref_article = $request->input('ref_article');
        $detail->libelle1 = $request->input('libelle_1');
        $detail->valeur1 = $request->input('valeur_1');
        $detail->libelle2 = $request->input('libelle_2');
        $detail->valeur2 = $request->input('valeur_2');
        $detail->libelle3 = $request->input('libelle_3');
        $detail->valeur3 = $request->input('valeur_3');
        $detail->libelle4 = $request->input('libelle_4');
        $detail->valeur4 = $request->input('valeur_4');
        $detail->libelle5 = $request->input('libelle_5');
        $detail->valeur5 = $request->input('valeur_5');
        $detail->save();
 
        return back();

    }

    public function NewTaille(Request $request){


        $taille = new Taille_article();
        $taille->ref_taille_article = $request->input('ref_taille_article');
        $taille->ref_article = $request->input('ref_article');
        $taille->libelle_taille_article = $request->input('libelle_taille_article');
        $taille->save();
 
        return back();

    }

    public function NewArticle(Request $request){ 

        $val = random_int(1, 10000);
        
        $article = new Article();
        

            $fileNameWithExt = $request->file('image_1')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('image_1')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'.'.$ext;
            $path = $request->file('image_1')->storeAs('img/shop/catalog', $fileNameToStore);

            $fileNameWithExt = $request->file('image_2')->getClientOriginalName();
            $fileName1 = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('image_2')->getClientOriginalExtension();
            $fileNameToStore1 = $fileName1.'.'.$ext;
            $path = $request->file('image_2')->storeAs('img/shop/catalog', $fileNameToStore1);

            $fileNameWithExt = $request->file('image_3')->getClientOriginalName();
            $fileName2 = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('image_3')->getClientOriginalExtension();
            $fileNameToStore2 = $fileName2.'.'.$ext;
            $path = $request->file('image_3')->storeAs('img/shop/catalog', $fileNameToStore2);

            if ($path === false) {
                // Gérer l'erreur de téléchargement du fichier
                return back()->withErrors(['error' => 'Erreur lors de l\'enregistrement de l\'image 1']);
            }
         
        
        $article->image_article = $fileNameToStore;
        $article->image2_article = $fileNameToStore1;
        $article->image3_article = $fileNameToStore2;
        $article->ref_article = $request->input('ref_article');
        $article->Num_article = "NUM".time();
        $article->ref_categorie = $request->input('ref_categorie');
        $article->ref_marque = $request->input('ref_marque');
        $article->ref_fournisseur = $request->input('ref_fournisseur');
        $article->type_article = $request->input('type_article');
        $article->libelle_article = $request->input('libelle_article');
        $article->prix = $request->input('prix_1');
        $article->prix_2 = $request->input('prix_2');
        $article->statut = $request->input('statut');
        $article->couleur_statut = $request->input('couleur_statut');
        $article->disponibilite = "stock disponible";

        $article->save();
 
        return back();

    }
}
