<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Article;
use App\Models\Cart;
use App\Models\Client;
use App\Models\Favorie; 
use App\Models\Info_adresse;
use App\Models\CodePromo;
use App\Models\Commande;
use App\Models\SuivieCommande;
use App\Mail\TestMail;

class ClientController extends Controller
{
    
    public function checkout(){

            if(Session::has('client')){
                 $ref = Session('client')->ref_client;
                 $affiche_adresses = DB::table('info_adresses')->where('ref_client','=',$ref)->first();
                    if($affiche_adresses){

                        return view('client.checkout-shipping');
                    }
                
                return view('client.checkout-details');
            }
    return redirect('/client/signin');
    }


    

    // pour gerer la methode de livraison
    public function Expedition(Request $request){

        $method = $request->input('shipping-method');
        $affiche_methode = DB::table('mode_livraisons')->where('libelle_mode_livraison','=',$method)->first();

        $valeur = $affiche_methode->valeur_mode_livraison;
        

        Session()->put('method_livraison',$method);
        Session()->put('valeur_livraison',$valeur);

        return view('client.checkout-paiement');
    }



    // pour gerer le code promo
    public function CodePromo(Request $request){

        $code = $request->input('CodePromo');

        $recherche_code = DB::table('code_promos')->where('libelle_CodePromo','=',$code)->first();
        if($recherche_code){

            Session()->put('CodePromo',$code);
            Session()->put('ValeurPromo',$recherche_code->valeur);

            return back()->with('codevalid','Code promo valide veuillez passer a la caisse');
        }

        return back()->with('codenonvalid','Code promo non valide');
    }



    //
    public function shipping(){

        return view('client.checkout-shipping');
    }



    //pour l'ajout d'un article comme favories
    public function favories(Request $request, $ref_article){
        
        if(Session::has('client')){
            $ref = Session('client')->ref_client;
            $verifie = DB::table('favories')->where('ref_article','=',$ref_article)->where('ref_client','=',$ref)->first();
            if($verifie){ 
                
            }
            else{

                $favorie = new Favorie();
                $favorie->ref_article = $ref_article;
                $favorie->ref_client = Session('client')->ref_client;
    
                $favorie->save();
            }

        return back();
        }
     }


     //pour supprimer un article considere comme article favorie par un client
    public function RemoveFavorie($ref_article){

        $ref = Session('client')->ref_client;
        $RemoveFavorie = DB::table('favories')->where('ref_article','=',$ref_article)->where('ref_client','=',$ref)->delete();
    
        return back();

    }


    // pour avoir la methode de paiement
    public function MethodPay(Request $request){

        $Paiement = $request->input('Paiement');

       if(Session::has('client')) {

            $ref = Session('client')->ref_client;
            $affiche_address_client = DB::table('info_adresses')->where('ref_client','=',$ref)->first();

        }

        Session()->put('MethodPay',$Paiement);

        return view('client.checkout-review',[
            'affiche_address_client' => $affiche_address_client
        ]);
        
    }



    public function review(){

        return view('client.checkout-review');
    }



    public function signin(){
        return view('client.account-signin');
    }


    //pour la creation du compte utilisateur
    public function createaccount(Request $request){

        $this->validate($request,[
            
            'telephone' => 'required|max:10|unique:clients',
            'email' => 'email|required|unique:clients',
            'password' => 'required|min:4'
        ]);
        
        $val = random_int(1, 10);

        $client = new Client();
        $client->ref_client = 'CLIENT'.substr($request->input('nom'),0,2 ).$val;
        $client->nom = $request->input('nom');
        $client->prenoms = $request->input('prenoms');
        $client->email = $request->input('email');
        $client->telephone = $request->input('telephone');
        $client->password = bcrypt($request->input('password'));

        $client->save();

        return back()->with('status','Votre compte à été créé avec succès !!, Veuillez svp vous connecter');
    }


    //pour la connexion au compte utilisateur
    public function accessaccount(Request $request){

        $this->validate($request,[
            
            'email' => 'email|required'
        ]);

        $client = Client::where('email',$request->email)->first();

        if($client){
            if (Hash::check($request->input('password'),$client->password)) {
                # code...
                Session::put('client',$client);
                return redirect('/');
            }
            return back()->with('error','mauvais email ou mot de passe');
        }
        return back()->with('error', "Vous n'avez pas de compte avec cet email");
    }



    //pour la connexion au compte utilisateur
    public function account($ref_client){
        
        // cette requete me permet au client d'avoir acces a son compte apres s'etre connecter
        $affiche_info_client = Client::where('ref_client','=',$ref_client)->first();
        return view('client.account-profile',[
            'affiche_info_client' => $affiche_info_client
        ]);
    }

    //pour avoir acces directement a la page favories dans le compte du client
    public function AccountFavories($ref_client){
        
        if(Session::has('client'))

         //cette requete me permet d'afficher les articles favories d'un client sur son compte 
        $ref_client = Session('client')->ref_client;    
        $affiche_article_wishlist = DB::table('favories')->join('articles', 'favories.ref_article', '=', 'articles.ref_article')->where('favories.ref_client','=',Session('client')->ref_client)->get();

        return view('client.account-wishlist',[
            'affiche_article_wishlist' => $affiche_article_wishlist
        ]);
    }


    // cette requete me permet de modifier les infors(nom,prenoms,telephone) du client
    public function ModifInfoClient(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'max:2048|mimes:jpeg,png,jpg'
        ]);
    
        $client = Client::find($id);
    
        if ($request->hasFile('image_client')) {
            $image = $request->file('image_client');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('img/shop/client'), $imageName);
            $client->image_client = $imageName;
        }
    
        $client->nom = $request->input('nom');
        $client->prenoms = $request->input('prenoms');
        $client->telephone = $request->input('telephone');
        $client->update();
    
        return redirect('/client/signin')->with('validate', "Mise à jour effectuée avec succès, veuillez vous reconnecter !");
    }
    

    //pour la connexion au compte utilisateur orders
    public function orders(){
        
         //cette requete me permet d'afficher les commandes du client
        $affiche_info = DB::table('info_adresses')->where('info_adresses.ref_client','=',Session('client')->ref_client)->first();
        $affiche_commande = Commande::where('ref_info_adresse','=',$affiche_info->ref_info_adresse)->get();
        return view('client.account-orders',[
                'affiche_commande' => $affiche_commande
        ]);
    }

    //pour la connexion au compte utilisateur wishlist
    public function wishlist($ref_client){
        
        if(Session::has('client'))

         //cette requete me permet d'afficher les articles favories d'un client sur son compte 
        $ref_client = Session('client')->ref_client;    
        $affiche_article_wishlist = DB::table('favories')->join('articles', 'favories.ref_article', '=', 'articles.ref_article')->where('favories.ref_client','=',Session('client')->ref_client)->get();

        return view('client.account-wishlist',[
            'affiche_article_wishlist' => $affiche_article_wishlist,
            
        ]);
    }


     //pour la connexion au compte utilisateur tickets
     public function tickets(){
        
        return view('client.account-tickets');
    }


     //pour la connexion au compte utilisateur address
     public function address(){
        $ref_client = Session('client')->ref_client;    
        $affiche_adresses = DB::table('info_adresses')->where('ref_client','=',$ref_client)->get();

        return view('client.account-address',[
            'affiche_adresses' => $affiche_adresses
        ]);
    }


     //pour la connexion au compte utilisateur payment
     public function payment(){
        
        return view('client.account-payment');
    }


    //pour la connexion au compte utilisateur
   public function logout(){
        Session::forget('client');
       return redirect('/');
    }

    //pour ajouter dans la table Info_adresse  des infos supplement en ce qui concerne le client
    public function PlusInfo(Request $request){
        
        $this->validate($request,[
            
            'telephone2' => 'required|max:10',
            
        ]);
        $info = DB::table('info_adresses')->where('ref_client','=',$request->input('ref'))->first();
        if($info){ 
            
                return view('client.checkout-shipping');
        }

        $val = random_int(1, 10);

        $info = new Info_adresse();
        $info->ref_info_adresse = 'PLUS'.$val;
        $info->ref_client = $request->input('ref');
        $info->telephone2 = $request->input('telephone2');
        $info->adresse = $request->input('adresse');
        $info->ville = $request->input('ville');
        $info->commune = $request->input('commune');
        $info->quartier = $request->input('quartier');
        $info->info_supplementaire = $request->input('info_supplementaire');
        $info->sauvegarde = $request->input('sauvegarde');
       
        $info->save();

        return view('client.checkout-shipping');
    }

    //pour valider une commande de la part du client

    public function ValidateCommande(Request $request){

 
        // $rech_commande = DB::table('commandes')->where('ref_commande','=',$request->input('ref'))->first(); 
        // @if (condition) {
        //     # code...
        // }

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        $Commande = new Commande();
        $Commande->ref_commande = 'COMD'.substr(Session('client')->nom,0,4 ).time();
        $Commande->ref_info_adresse = $request->input('ref_info_adresse');
        $Commande->nom_client = Session('client')->nom;
        $Commande->prenom_client = Session('client')->prenoms;
        $Commande->adresse = $request->input('adresse');
        $Commande->telephone = Session('client')->telephone;
        $Commande->ville = $request->input('ville');
        $Commande->commune = $request->input('commune');
        $Commande->mode_livraison = Session('method_livraison');
        $Commande->statut = 'etape1';
        $Commande->methode_paiement = Session('MethodPay');
        $Commande->cart = serialize($cart);

        Session::put('numero',$Commande->ref_commande);

        $Commande->save();

        $SuivieCommande = new SuivieCommande();
        $SuivieCommande->ref_suivie_commande = 'SU'.'COMD'.substr(Session('client')->nom,0,2 ).time();
        $SuivieCommande->ref_commande = 'COMD'.substr(Session('client')->nom,0,4 ).time();
        $SuivieCommande->methode_livraison = Session('method_livraison');
        $SuivieCommande->statut = 'etape1';

        $SuivieCommande->save();
       
        Session::forget('cart');
        Session::forget('topCart');
        Session::forget('CodePromo');
        Session::forget('ValeurPromo');

        return view('client.checkout-complete');
    }

    public function order($numero){
        $infocommande = DB::table('suivie_commandes')->where('ref_commande','=',$numero)->first();
        if($infocommande){

            $detailcommande = DB::table('suivie_commandes')->where('ref_commande','=',$infocommande->ref_commande)->first();
            return view('client.order-tracking',['detailcommande' => $detailcommande]);
        }

    }

    public function ordercommande(Request $request){
            
        $infocommande = DB::table('suivie_commandes')->where('ref_commande','=',$request->input('NumeroCommande'))->first();
        if($infocommande){
            $detailcommande = DB::table('suivie_commandes')->where('ref_commande','=',$request->input('NumeroCommande'))->first();
             return view('client.order-tracking',['detailcommande' => $detailcommande]);
        }
    }
    
    
}
