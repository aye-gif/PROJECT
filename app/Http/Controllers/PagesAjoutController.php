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
use App\Models\DetailArticle;
use App\Models\TailleArticle;

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
        $fournisseur->ref_fournisseur = "FOURN".substr($request->input('libelle_Fournisseur'),0,2 );
        $fournisseur->libelle_fournisseur = $request->input('libelle_Fournisseur');
        $fournisseur->telephone = $request->input('telephone');
        $fournisseur->save();
 
        return back();

    }

    public function NewDetail(Request $request){


        $detail = new DetailArticle();
        $detail->ref_detail_article =  "DETAIL";
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


        $taille = new TailleArticle();
        $taille->ref_taille_article = $request->input('ref_taille_article');
        $taille->article_id = $request->input('id_article');
        $taille->libelle_taille_article = $request->input('libelle_taille_article');
        $taille->save();
 
        return back();

    }

    public function NewArticle(Request $request){ 

        $val = random_int(1, 10000);

        $image = $request->file('image_1');
        $image2 = $request->file('image_2');
        $image3 = $request->file('image_3');

        if ($request->hasFile('image_1')) {
            $imageName = time().'1'.'.'.$image->getClientOriginalExtension();
            $image->move(public_path('img/shop/catalog'), $imageName);
            
        }

        if ($request->hasFile('image_2')) {
            $imageName1 = time().'2'.'.'.$image2->getClientOriginalExtension();
            $image2->move(public_path('img/shop/catalog'), $imageName1);
            
        }

        if ($request->hasFile('image_3')) {
            $imageName2 = time().'3'.'.'.$image3->getClientOriginalExtension();
            $image3->move(public_path('img/shop/catalog'), $imageName2);
            
        }
        
        $article = new Article();
         
        
        $article->image_article = $imageName;
        $article->image2_article = $imageName1;
        $article->image3_article = $imageName2;
        $article->ref_article = $request->input('ref_article');
        $article->Num_article = "NUM".time();
        $article->detail_id = $request->input('id_detail');
        $article->categorie_id = $request->input('id_categorie');
        $article->marque_id = $request->input('id_marque');
        $article->fournisseur_id = $request->input('id_fournisseur');
        $article->type_article = $request->input('type_article');
        $article->libelle_article = $request->input('libelle_article');
        $article->prix = $request->input('prix_1');
        $article->prix_2 = $request->input('prix_2');
        $article->statut = $request->input('statut');
        $article->couleur_statut = $request->input('couleur_statut');
        $article->disponibilite = "stock disponible";

        $article->save();
 
        return redirect('/admin/ListeArticle');

    }
}
