<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\Article;
use App\Models\Categories;
use App\Models\Fournisseur;
use App\Models\Commande;
use App\Models\Client;
use App\Models\Favorie;
use App\Models\Detail_article;
use App\Models\Info_adresse;

class AdminController extends Controller
{
    
    //
    public function admin(){

        return view('admin.sign-in');
    }

    public function dashboard(){

        return view('admin.admin-dashboard');
    }

    //pour la connexion au compte admin
    public function adminaccount(Request $request){

        $this->validate($request,[
            
            'emailadmin' => 'email|required'
        ]);

        $admin = DB::table('admins')->where('email','=',$request->emailadmin)->where('password','=',$request->passwordadmin)->first();
        if($admin){
                Session::put('admin',$admin);


            // cette requete me permet d'afficher les commandes
            $affiche_comandes = Commande::All();

            // cette requete me permet d'afficher les clients
            $affiche_client = Client::All();

            // cette requete me permet d'afficher les favories
            $affiche_favorie = Favorie::All();

            // cette requete me permet d'afficher les fournisseurs
            $affiche_fournisseur = Fournisseur::All();

            $affiche_comandes->transform(function($affiche_cart, $key){
                    $affiche_cart->cart = unserialize($affiche_cart->cart);

                return $affiche_cart;
            });

            return view('admin.agent-dashboard',[
                'affiche_comandes' => $affiche_comandes,
                'affiche_client' => $affiche_client,
                'affiche_favorie' => $affiche_favorie,
                'affiche_fournisseur' => $affiche_fournisseur,
            ]);
        }
        return back()->with('error', "Vous n'avez pas de compte avec cet email");
    }

    public function ListeArticle(){

        
        // cette requete me permet d'afficher les articles
        $affiche_article = DB::table('articles')->get();

        // // cette requete me permet d'afficher les categories
        // $affiche_categorie = DB::table('categories')->get();

        // // cette requete me permet d'afficher les fournisseur
        // $affiche_fournisseur = DB::table('fournisseurs')->get();

        return view('admin.ListeArticle',[
            'affiche_article' => $affiche_article
            // 'affiche_categorie' => $affiche_categorie,
            // 'affiche_fournisseur' => $affiche_fournisseur
        ]);
    }

    public function AjouterArticle(){

        // cette requete me permet d'afficher les articles
        $affiche_article = DB::table('articles')->paginate(20);

        // cette requete me permet d'afficher les categories
        $affiche_categorie = DB::table('categories')->get();

        // cette requete me permet d'afficher les marques
        $affiche_marque = DB::table('marques')->get();

        // cette requete me permet d'afficher les fournisseur
        $affiche_fournisseur = DB::table('fournisseurs')->get();

        return view('admin.PagesAjout.AjouterArticle',[
            'affiche_article' => $affiche_article,
            'affiche_categorie' => $affiche_categorie,
            'affiche_marque' => $affiche_marque,
            'affiche_fournisseur' => $affiche_fournisseur
        ]);
    }

    public function AjouterCategorie(){

        // cette requete me permet d'afficher les categories
        $affiche_categorie = DB::table('categories')->get();

        return view('admin.PagesAjout.AjouterCategorie',[
            'affiche_categorie' => $affiche_categorie
        ]);
    }

    public function AjouterDetail(){

        // cette requete me permet d'afficher les details des articles
        $affiche_detail = DB::table('detail_articles')->paginate(20);

         // cette requete me permet d'afficher les articles
         $affiche_article = DB::table('articles')->get();

        return view('admin.PagesAjout.AjouterDetail',[
            'affiche_detail' => $affiche_detail,
            'affiche_article' => $affiche_article,
        ]);
    }

    public function AjouterTaille(){

        // cette requete me permet d'afficher les tailles concernant un articles
        $affiche_taille = DB::table('taille_articles')->paginate(20);

         // cette requete me permet d'afficher les articles
         $affiche_article = DB::table('articles')->get();

        return view('admin.PagesAjout.AjouterTaille',[
            'affiche_taille' => $affiche_taille,
            'affiche_article' => $affiche_article,
        ]);
    }

    public function AjouterMarque(){

        // cette requete me permet d'afficher les marques
        $affiche_marque = DB::table('marques')->get();
        return view('admin.PagesAjout.AjouterMarque',[
            'affiche_marque' => $affiche_marque
        ]);
        return view('admin.PagesAjout.AjouterMarque');
    }

    public function AjouterFournisseur(){

        // cette requete me permet d'afficher les FOURNISSEUR
        $affiche_fournisseur = DB::table('fournisseurs')->get();
        return view('admin.PagesAjout.AjouterFournisseur',[
            'affiche_fournisseur' => $affiche_fournisseur
        ]);
    }

    public function ListeSuivieCommande(){

        // cette requete me permet d'afficher la table suivie commande
        $affiche_suivie_commande = DB::table('suivie_commandes')->get();

        return view('admin.ListeSuivieCommande',[
            'affiche_suivie_commande' => $affiche_suivie_commande
        ]);
    }

    public function VoirClient($info_adresse){

        // cette requete me permet d'afficher la table suivie commande
        $affiche_detail_client = DB::table('info_adresses')->join('clients', 'info_adresses.ref_client', '=' , 'clients.ref_client')->where('ref_info_adresse','=',$info_adresse)->first();
        return view('admin.VoirClient',[
            'affiche_detail_client' =>  $affiche_detail_client
        ]);
    }

}
