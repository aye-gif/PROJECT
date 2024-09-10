<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\Fournisseur;
use App\Models\Commande;
use App\Models\Transaction;
use App\Models\Client;
use App\Models\Favorie;
use App\Models\SuivieCommande;
use App\Models\DetailArticle;
use App\Models\Info_adresse;
use App\Models\Cart;
use Carbon\Carbon;

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
    public function PageAgent(){

        // Obtenir la date du jour au format 'YYYY-MM-DD'
        $today = Carbon::now()->format('Y-m-d');

        // Effectuer la requête pour obtenir les transactions du jour
        $transactions = DB::table('transactions')
                            ->join('commandes','commandes.id','=','transactions.commande_id')
                            ->join('clients','clients.id','=','commandes.client_id')
                            ->whereRaw("JSON_CONTAINS(contenue, JSON_OBJECT('date', ?), '$')", [$today])
                            ->get();

        // cette requete me permet d'afficher les commandes
        $affiche_comandes = DB::table('commandes')->join('clients','clients.id','=','commandes.client_id')
                                                  ->select('commandes.*', 'clients.nom', 'clients.prenoms', 'clients.telephone')
                                                  ->get();

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
                    'affiche_transactions' => $transactions,
                    'affiche_date' => $today,
                ]);

    }

    //pour la connexion au compte admin
    public function adminaccount(Request $request){

        $this->validate($request,[
            
            'emailadmin' => 'email|required'
        ]);
        $admin = Admin::where('email',$request->emailadmin)->first();
        if ($admin) {
            # code...
            if (Hash::check($request->input('passwordadmin'),$admin->password)) {
                # code...

                Session::put('admin',$admin);

                    // Obtenir la date du jour au format 'YYYY-MM-DD'
                    $today = Carbon::now()->format('Y-m-d');

                    // Effectuer la requête pour obtenir les transactions du jour
                    $transactions = DB::table('transactions')
                                        ->join('commandes','commandes.id','=','transactions.commande_id')
                                        ->join('clients','clients.id','=','commandes.client_id')
                                        ->whereRaw("JSON_CONTAINS(contenue, JSON_OBJECT('date', ?), '$')", [$today])
                                        ->get();

                    // cette requete me permet d'afficher les commandes
                    $affiche_comandes = DB::table('commandes')->join('clients','clients.id','=','commandes.client_id')
                                                              ->select('commandes.*', 'clients.nom', 'clients.prenoms', 'clients.telephone')
                                                              ->get();

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
                                'affiche_transactions' => $transactions,
                                'affiche_date' => $today,
                            ]);
            }

            
        }

    }

    public function SearchTransaction(Request $request){

        $this->validate($request,[
            
            'DateTransaction' => 'required|date',
        ]);

        // Convertir la date en objet Carbon
        $date = Carbon::parse($request->DateTransaction);

        // Format de la date en 'YYYY-MM-DD'
        $today = $date->format('Y-m-d');

        // Effectuer la requête pour obtenir les transactions du jour
        $transactions = DB::table('transactions')
                            ->join('commandes','commandes.id','=','transactions.commande_id')
                            ->join('clients','clients.id','=','commandes.client_id')
                            ->whereRaw("JSON_CONTAINS(contenue, JSON_OBJECT('date', ?), '$')", [$today])
                            ->get();

        session()->flash('transactions', $transactions);
        
        return view('admin.ListeTransaction',[
            'affiche_date' => $today
        ]);
    }

    public function ListeArticle(){

        
        // cette requete me permet d'afficher les articles
        // $affiche_article = DB::table('articles')->get();

        
        // Deuxième requête : Sélectionner toutes les classes où le professeur a l'ID 1
        $affiche_article = DB::table('articles')->join('categories', 'categories.id', '=', 'articles.categorie_id')
                                                ->select('articles.id','articles.ref_article','categories.libelle_categorie','articles.type_article','articles.libelle_article','articles.prix')
                                                ->get();

        // // cette requete me permet d'afficher les categories
        // $affiche_categorie = DB::table('categories')->get();

        // // cette requete me permet d'afficher les fournisseur
        // $affiche_fournisseur = DB::table('fournisseurs')->get();

        return view('admin.ListeArticle',[
            'affiche_article' => $affiche_article
        ]);
    }

    public function VoirArticle($id){
        
        // Deuxième requête : Sélectionner toutes les classes où le professeur a l'ID 1
        $affiche_info_article = DB::table('articles')->join('categories', 'categories.id', '=', 'articles.categorie_id')
                                                ->join('detail_articles', 'detail_articles.id', '=', 'articles.detail_id')
                                                ->join('marques', 'marques.id', '=', 'articles.marque_id')
                                                ->join('fournisseurs', 'fournisseurs.id', '=', 'articles.fournisseur_id')
                                                ->where('articles.id', $id)
                                                ->first();

        

        return view('admin.VoirArticle',[
            'affiche_article' => $affiche_info_article
        ]);
    }

    public function AjouterArticle(){

        // cette requete me permet d'afficher les articles
        $affiche_article = DB::table('articles')->paginate(20);

        // cette requete me permet d'afficher les categories
        $affiche_categorie = DB::table('categories')->get();

        // cette requete me permet d'afficher les marques
        $affiche_marque = DB::table('marques')->get();

        // cette requete me permet d'afficher les details disponible
        $affiche_detail = DB::table('detail_articles')->get();

        // cette requete me permet d'afficher les fournisseur
        $affiche_fournisseur = DB::table('fournisseurs')->get();

        return view('admin.PagesAjout.AjouterArticle',[
            'affiche_article' => $affiche_article,
            'affiche_categorie' => $affiche_categorie,
            'affiche_marque' => $affiche_marque,
            'affiche_detail' => $affiche_detail,
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

    public function ListeTransaction(){


        return view('admin.ListeTransaction');
    }

    public function VoirClient($info_adresse){

        // cette requete me permet d'afficher la table suivie commande
        $affiche_detail_client = DB::table('info_adresses')->join('clients', 'info_adresses.ref_client', '=' , 'clients.ref_client')->where('ref_info_adresse','=',$info_adresse)->first();
        return view('admin.VoirClient',[
            'affiche_detail_client' =>  $affiche_detail_client
        ]);
    }

    public function ListeClient(){

        // cette requete me permet d'afficher la liste des client

        $affiche_client = Client::all();

        return view('admin.ListeClient',[
            'affiche_liste_client' =>  $affiche_client
        ]);
    }

    public function voirCommande($id){

        // cette requete me permet d'afficher les commandes du clients
        $affiche_commande = Commande::find($id);

        // Désérialiser les données du panier
        $cart = unserialize($affiche_commande->cart);

        return view('admin.voirCommande',[
            'cart' =>  $cart
        ]); 
    }

    public function infoCommande($id){

        // cette requete me permet d'afficher les commandes du clients
        $affiche_info_commande = Commande::where('client_id',$id)->get();

        return view('admin.infoCommande',[
            'affiche_liste_commande' =>  $affiche_info_commande
        ]); 
    }

    public function etapeCommande($ref_commande){

        // cette requete me permet d'afficher les commandes du clients
        $affiche_info_commande = Commande::where('ref_commande', $ref_commande)->first();

        if ($affiche_info_commande) {
            # code...

            $affiche_info_commande->update(['statut' => 'etape3']);
        }

        return back(); 
    }

    public function infoTransaction($id){

        // cette requete me permet d'afficher les commandes du clients
        $affiche_info_transaction = DB::table('commandes')->join('transactions','transactions.commande_id','=','commandes.id')
                                                          ->where('commande_id','=',$id)
                                                          ->get();
        // cette requete me permet d'afficher les commandes du clients
        $affiche_ref = Commande::where('id',$id)->first();

        return view('admin.infoTransaction',[
            'affiche_liste_transaction' =>  $affiche_info_transaction,
            'affiche_ref_transaction' =>  $affiche_ref,
        ]); 
    }

    public function TransactionValidate($transactionId,$IdContenu){

        // Trouvez la leçon dans la base de données
        $transaction = Transaction::where('id', $transactionId)->first();

        if ($transaction) {

            // Décodez le contenu JSON en un tableau
            $contenue = json_decode($transaction->contenue, true);

            // Trouvez le contenu avec l'ID spécifié
                $contentToUpdate = null;
                foreach ($contenue as $key => $content) {
                    if ($content['id'] == $IdContenu) {
                        $contentToUpdate = &$contenue[$key];
                        break;
                    }
                }
                $contentToUpdate['statut'] = 1;
                    $transaction->contenue = json_encode($contenue);
                    $transaction->save();
        }

        return back(); 
    }

    //pour la connexion au compte utilisateur
    public function logoutAdmin(){

        Session::forget('admin');
       return redirect('/admin');
    }

}
