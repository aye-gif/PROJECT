<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Article;
use App\Models\Categories;
use App\Models\Couleur;
use App\Models\Taille_article;
use App\Models\Detail_article;
use App\Models\Marque;
use App\Models\Favorie;
use App\Models\Commentaire;

class PagesController extends Controller
{
    

    //
    public function home()
    {   
        // c'est deux requetes ci-dessous me permettrons d'afficher le 12 premiers articles femmes 
        $articles_6_f = Article::where('id','<=','6')->get();
        $articles_12_f = Article::where('id','<=','12')->orderBy('id', 'desc')->take(6)->get();

        // c'est deux requetes ci-dessous me permettrons d'afficher le 12 premiers articles homme
        $articles_6_h = Article::where('id','>=','13')->take(6)->get();
        $articles_12_h = Article::where('id','<=','24')->orderBy('id', 'desc')->take(6)->get();

        // c'est deux requetes ci-dessous me permettrons d'afficher le 12 premiers articles enfant
        $articles_6_e = Article::where('id','>=','25')->take(6)->get();
        $articles_12_e = Article::where('id','<=','37')->orderBy('id', 'desc')->take(6)->get();

        // cette requete me permet d'afficher 5 articles de statut bestsellers
        $articles_bestsellers = Article::where('statut','=','bestsellers')->take(5)->get();

        // cette requete me permet d'afficher 5 articles de statut new arrivage
        $articles_new_arrivage = Article::where('statut','=','new arrivage')->take(5)->get();

        // cette requete me permet d'afficher 5 type_articles de categorie femme
        //$affiche_4_type_femme = DB::table('articles')->select('type_article', DB::raw('COUNT(*) as article_count'))->where('ref_categorie','=','VETEMF')->groupBy('type_article')->take(5)->get();

        
        return view('home-fashion-store-v2', [
                'articles_6_f' => $articles_6_f,
                'articles_12_f' => $articles_12_f,
                'articles_6_h' => $articles_6_h,
                'articles_12_h' => $articles_12_h,
                'articles_6_e' => $articles_6_e,
                'articles_12_e' => $articles_12_e,
                'articles_bestsellers' => $articles_bestsellers,
                'articles_new_arrivage' => $articles_new_arrivage
            ]
        );
    }
    public function PasswordForget(){
        return view('client.account-password-recovery');
    }


    public function plus(){
        // cette requete me permet d'afficher les 20 premiers articles de ma base de donnee
        $affiche_20_article = DB::table('articles')->paginate(20);
    

        // cette requete me permet d'afficher les type article qui concerne les femmes
        $affiche_categorie_femme = DB::table('articles')->select('type_article', DB::raw('COUNT(*) as article_count'))->where('ref_categorie','=','VETEMF')->groupBy('type_article')->get();


        // cette requete me permet d'afficher les type article qui concerne les hommes
        $affiche_categorie_homme = DB::table('articles')->select('type_article', DB::raw('COUNT(*) as article_count'))->where('ref_categorie','=','VETEMH')->groupBy('type_article')->get();


        // cette requete me permet d'afficher les type article qui concerne les enfants
        $affiche_categorie_enfant = DB::table('articles')->select('type_article', DB::raw('COUNT(*) as article_count'))->where('ref_categorie','=','VETEME')->groupBy('type_article')->get();

        // cette requete me permet d'afficher les marques disponible dans notre base 
        $compte_article = Article::get();

        // cette requete me permet d'afficher les marques disponible dans notre base 
        $affiche_marque = Marque::get();
        $affiche_marque = DB::table('marques')->select('libelle_marque')->groupBy('libelle_marque')->get();


        // cette requete me permet d'afficher les tailles disponible dans notre base
        $affiche_taille = DB::table('taille_articles')->select('libelle_taille_article')->groupBy('libelle_taille_article')->get();

        // cette requete me permet d'afficher les couleur disponible dans notre base
        $affiche_couleur = DB::table('couleurs')->select('libelle_couleur','lien_couleur')->groupBy('libelle_couleur','lien_couleur')->get();



        return view('shop.shop-grid-ft',[
            'affiche_20_article' => $affiche_20_article,
            'affiche_categorie_femme' => $affiche_categorie_femme,
            'affiche_categorie_homme' => $affiche_categorie_homme,
            'affiche_categorie_enfant' => $affiche_categorie_enfant,
            'affiche_marque' => $affiche_marque,
            'affiche_taille' => $affiche_taille,
            'affiche_couleur' => $affiche_couleur,
            'compte_article' => $compte_article
                ]
            );
    }

    public function cart(){
        return view('shop.shop-cart');
    }

    public function shop(){
        return view('shop.shop-single-v2');
    }

    public function categorie(){
        
        return view('categorie.shop-grid-rs');
    }

    public function info($ref_article){

        // cette requete me permet d'afficher les info de l'article selectionne     
        $affiche_info_article = DB::table('articles')->join('couleurs', 'articles.ref_article', '=' , 'couleurs.ref_article')->join('detail_articles', 'detail_articles.ref_article', '=' , 'articles.ref_article')->where('articles.ref_article','=',$ref_article)->first();
 
        // cette requete me permet d'afficher la couleur sur un article selectionne
        $affiche_couleur_article = DB::table('couleurs')->where('couleurs.ref_article','=',$ref_article)->get();

        // cette requete me permet d'afficher la couleur sur un article selectionne
        $affiche_taille_article = DB::table('taille_articles')->where('taille_articles.ref_article','=',$ref_article)->get();

        // cette requete me permet d'afficher les detail sur l'article selectionne
        $affiche_detail_article = DB::table('detail_articles')->where('detail_articles.ref_article','=',$ref_article)->first();
        
        // cette requete me permet de gerer les commentaires en ce qui concerne l'article selectionne
        $affiche_commentaire_article = DB::table('commentaires')->where('ref_article','=',$ref_article)->take(5)->get();

        // cette requete me permet de compter le nombre total de commentaires
        $compte_total_commentaire = DB::table('commentaires')->get();
        
        // cette requete me permet d'afficher les commentaires ayant 5 etoiles en ce qui concerne l'article selectionne
        $affiche_etoile_5 = DB::table('commentaires')->where('ref_article','=',$ref_article)->where('etoile','=', 5)->get();
        
        // cette requete me permet d'afficher les commentaires ayant 4 etoiles en ce qui concerne l'article selectionne
        $affiche_etoile_4 = DB::table('commentaires')->where('ref_article','=',$ref_article)->where('etoile','=', 4)->get();

        // cette requete me permet d'afficher les commentaires ayant 3 etoiles en ce qui concerne l'article selectionne
        $affiche_etoile_3 = DB::table('commentaires')->where('ref_article','=',$ref_article)->where('etoile','=', 3)->get();
        
        // cette requete me permet d'afficher les commentaires ayant 2 etoiles en ce qui concerne l'article selectionne
        $affiche_etoile_2 = DB::table('commentaires')->where('ref_article','=',$ref_article)->where('etoile','=', 2)->get();

        // cette requete me permet d'afficher les commentaires ayant 1 etoiles en ce qui concerne l'article selectionne
        $affiche_etoile_1 = DB::table('commentaires')->where('ref_article','=',$ref_article)->where('etoile','=', 1)->get();
        
        // cette requete me permet d'afficher la couleur sur un article selectionne
        $affiche_meme_type = DB::table('articles')->where('ref_article','=',$ref_article)->get();

                $affiche_type_article = array();
                            foreach ($affiche_meme_type as $resultat) {
                                $affiche_type_article[] = $resultat->type_article;
                            }
                $affiche_ref_categorie_article = array();
                            foreach ($affiche_meme_type as $resultat) {
                                $affiche_ref_categorie_article[] = $resultat->ref_categorie;
                            }
        // cette requete me permet d'afficher d'autre article de meme type que celle selectionnée
        $affiche_meme_type_meme_categorie = DB::table('articles')->where('type_article', '=', $affiche_type_article)->where('ref_categorie', '=', $affiche_ref_categorie_article)->take(10)->get();
        
        // cette requete me permet d'afficher d'autre article different que celle selectionnée
        $affiche_different_type_meme_categorie = DB::table('articles')->where('type_article', '<>', $affiche_type_article)->where('ref_categorie', '=', $affiche_ref_categorie_article)->take(10)->get();
        


        return view('shop-single-v1',[
            'affiche_info_article' => $affiche_info_article,
            'affiche_couleur_article' => $affiche_couleur_article,
            'affiche_taille_article' => $affiche_taille_article,
            'affiche_detail_article' => $affiche_detail_article,
            'affiche_commentaire_article' => $affiche_commentaire_article,
            'compte_total_commentaire' => $compte_total_commentaire,
            'affiche_meme_type_meme_categorie' => $affiche_meme_type_meme_categorie,
            'affiche_different_type_meme_categorie' => $affiche_different_type_meme_categorie,
            'affiche_etoile_5' => $affiche_etoile_5,
            'affiche_etoile_4' => $affiche_etoile_4,
            'affiche_etoile_3' => $affiche_etoile_3,
            'affiche_etoile_2' => $affiche_etoile_2,
            'affiche_etoile_1' => $affiche_etoile_1,

                                        ]
                    );
    }
   // fonction me permettant d'increment le like
    public function LikeCommentaire($id){

        // if (Like::where('id_commentaire', $id )->where('id_client', Session('client')->id)->exists()) {
        //     # code...
        // }else{
        //     $like = new Like();
        //     $like->id_commentaire = $id;
        //     $like->id_client = Session('client')->id;
        //     $like->save();
        // } 
        
        // $affiche_like = Commentaire::where('id_commentaire', $id)->first();
            # code...
            $like = Commentaire::find($id);
            $recherche_info = DB::table('commentaires')->where('ref_article','=',$like->ref_article)->where('email','=',$like->email)->first();
            $like->like_comment = $recherche_info->like_comment + 1;
            $like->update();
       return back();
    }

    public function DislikeCommentaire($id){

        $dislike = Commentaire::find($id);
        // if ($dislike->count() > 0) 
        // {
            // cette requete me permet d'afficher les articles de meme type
            $recherche_info = DB::table('commentaires')->where('ref_article','=',$dislike->ref_article)->where('email','=',$dislike->email)->first();
            // if ($recherche_info) 
            // {
            //     return back();
            // }
            // else {
                # code...
                $dislike->dislike_comment = $recherche_info->dislike_comment + 1;
                $dislike->update();
        //     }
            
        // }

        return back();
    }
   
    public function type($type_article){
        
        // cette requete me permet d'afficher les articles de meme type
        $affiche_article_par_categorie = DB::table('articles')->where('type_article','=',$type_article)->get();
        if ($affiche_article_par_categorie->count() > 0){
            # code...
            return view('shop-list-rs',['affiche_article_par_categorie' => $affiche_article_par_categorie]);
        }
        else {
            # code... 
            return view('404-illustration');
            
        }
    }

    public function addtocomment(Request $request){

        if(Session::has('client')){
                $nom = Session('client')->nom;
                $mail = Session('client')->email;
            
                $val = random_int(1, 10);
        
                $commentaire = new Commentaire();
                $commentaire->ref_commentaire = 'COMMENT'.substr($request->input('nom'),0,2 ).$val;
                $commentaire->ref_article = $request->input('ref_article');
                $commentaire->nom = $nom;
                $commentaire->email = $mail;
                $commentaire->etoile = $request->input('etoile');
                $commentaire->commentaire = $request->input('commentaire');
        
                $commentaire->save();
        
           return back();
       }
        return redirect('/client/signin');

    }

    public  function recherche(Request $request){

        $term = $request->input('terme');
        if ($term == "") {
            # code...
            return view('404-illustration');
        }else{

            $affiche_resultat_recherche = Article::where('libelle_article', 'LIKE', '%'.$term.'%')->get();
            if ($affiche_resultat_recherche->count() > 0){
                # code...
                return view('recherche',['affiche_resultat_recherche' => $affiche_resultat_recherche]);
            }
            else {
                # code... 
                return view('404-illustration');
                
            }
        }
        
    }  

    

}
