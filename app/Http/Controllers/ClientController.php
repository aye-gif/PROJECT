<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Article;
use Mailjet\Resources;
use App\Models\Cart;
use Validator;
use Illuminate\Support\Str;
use App\Models\Transaction;
use App\Models\Favorie; 
use App\Models\InfoAdresse;
use App\Models\CodePromo;
use App\Models\Commande;
use App\Models\SuivieCommande;
use App\Mail\TestMail;
use Carbon\Carbon;
use GuzzleHttp\Client;
use App\Models\Client as ClientModel;

class ClientController extends Controller
{
    
    public function checkout(){

            if(Session::has('client')){
                 $id = Session('client')->id;
                 $affiche_adresses = InfoAdresse::where('client_id','=',$id)->first();
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
    public function favories($id_article){
        
        if(Session::has('client')){
            $id = Session('client')->id;
            $verifie = Favorie::where('article_id','=',$id_article)->where('client_id','=',$id)->first();
            if(!$verifie){ 
            
                $favorie = new Favorie();
                $favorie->article_id = $id_article;
                $favorie->client_id = $id ;
                $favorie->save();
            }

        return back();
        }
     }


     //pour supprimer un article considere comme article favorie par un client
    
     public function RemoveFavorie($article_id){

        $id = Session('client')->id;
        $RemoveFavorie = Favorie::where('article_id', $article_id)->where('client_id', $id)->delete();
    
        return back();

    }

    // pour avoir la methode de paiement
    public function MethodPay(Request $request){

        $Paiement = $request->input('Paiement');

       if(Session::has('client')) {

            $Idclient = Session('client')->id;
            $affiche_address_client = DB::table('info_adresses')->where('client_id','=',$Idclient)->first();

        }

        $reste = Session('cart')->totalPrice % $request->input('Paiement');

            Session()->put('MethodPay',$Paiement);
            Session()->put('reste',$reste);

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
        ],[
            'telephone.required' => 'Le champ nom est obligatoire.',
            'telephone.unique' => 'Numéro de télephone déja utilisé.',
            'email.unique' => 'Email déja utilisé.',
       ]);
        
        $val = random_int(1, 10);

        $client = new ClientModel();
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

        $client = ClientModel::where('email',$request->email)->first();

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
        $affiche_info_client = ClientModel::where('ref_client','=',$ref_client)->first();
        return view('client.account-profile',[
            'affiche_info_client' => $affiche_info_client
        ]);
    }

    //pour avoir acces directement a la page favories dans le compte du client
    public function AccountFavories($ref_client){
        
        if(Session::has('client'))

         //cette requete me permet d'afficher les articles favories d'un client sur son compte 
        $id_client = Session('client')->id;    
        $affiche_article_wishlist = DB::table('favories')->join('articles', 'favories.article_id', '=', 'articles.id')->where('favories.client_id', $id_client)->get();

        return view('client.account-wishlist',[
            'affiche_article_wishlist' => $affiche_article_wishlist
        ]);
    }

    // cette requete me permet de modifier les infors(nom,prenoms,telephone) du client
    public function ModifInfoClient(Request $request, $id){
        $this->validate($request, [
            'image' => 'max:2048|mimes:jpeg,png,jpg'
        ]);
    
        $client = ClientModel::find($id);
    
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
    
        return redirect('/');
    }
    
    //pour la connexion au compte utilisateur orders
    public function orders(){
        
         //cette requete me permet d'afficher les commandes du client
        // $affiche_info = InfoAdresse::where('info_adresses.client_id', Session('client')->id)->first();
        $affiche_commande = Commande::where('client_id', Session('client')->id)->get();
        return view('client.account-orders',[
                'affiche_commande' => $affiche_commande
        ]);
    }

    //pour la connexion au compte utilisateur wishlist
    public function wishlist($id_client){
        
        if(Session::has('client')){

            //cette requete me permet d'afficher les articles favories d'un client sur son compte 
            // $id_client = Session('client')->id;    
            $affiche_article_wishlist = DB::table('favories')->join('articles', 'favories.article_id', '=', 'articles.id')->where('favories.client_id', $id_client)->get();

            return view('client.account-wishlist',[
                'affiche_article_wishlist' => $affiche_article_wishlist,
                
            ]);
        }   
    }

    //pour la connexion au compte utilisateur tickets
    public function tickets(){
        
        return view('client.account-tickets');
    }

     //pour la connexion au compte utilisateur address
     public function address(){

        $id_client = Session('client')->id;    
        $affiche_adresses = InfoAdresse::where('client_id', $id_client)->get();

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
        $info = InfoAdresse::where('client_id','=',$request->input('id_client'))->first();
        if($info){ 
            
                return view('client.checkout-shipping');
        }

        $val = random_int(1, 10);

        $info = new InfoAdresse();
        $info->ref_info_adresse = 'PLUS'.$val;
        $info->client_id = $request->input('id_client');
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

        $nombreJour = floor(Session('cart')->totalPrice / Session('MethodPay')); 

        $aujourdhui = Carbon::now();
        $dateLivraison = $aujourdhui->addDays($nombreJour);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);


        $Commande = new Commande();
        $Commande->ref_commande = 'COMD'.substr(Session('client')->nom,0,4 ).time();
        $Commande->info_adresse_id = $request->input('id_info_adresse');
        $Commande->client_id = Session('client')->id;
        $Commande->mode_livraison = Session('method_livraison');
        $Commande->nombreJour = $nombreJour;
        $Commande->reste = Session('reste');
        $Commande->statut = 'etape1';
        $Commande->methode_paiement = Session('MethodPay');
        $Commande->cart = serialize($cart);

        Session::put('numero',$Commande->ref_commande);

        $Commande->save();

        // Initialiser un tableau pour stocker les enregistrements
        $Transaction = []; 

        for ($i=0; $i < $nombreJour; $i++) { 
            # code...
            $Transaction[] = [
                'id' => $i,
                'montant_a_paye' => Session('MethodPay'),
                'date' => Carbon::now()->addDays($i)->format('Y-m-d'),
                'statut' => 0,
            ];
        }

        // Convertir le tableau en une chaîne JSON
        $dataJson = json_encode($Transaction);

        $transac = Transaction::create([
            'commande_id' => $Commande->id,
            'ref_transaction' => 'TR'.'-'.substr(Session('client')->nom,0,4 ).'-'.$Commande->id,
            'contenue' => $dataJson ,                                     
        ]);


        $SuivieCommande = new SuivieCommande();
        $SuivieCommande->ref_suivie_commande = 'SU'.'COMD'.substr(Session('client')->nom,0,2 ).time();
        $SuivieCommande->ref_commande = 'COMD'.substr(Session('client')->nom,0,4 ).time();
        $SuivieCommande->methode_livraison = Session('method_livraison');
        $SuivieCommande->statut = 'etape1';
        $SuivieCommande->date_livraison = $dateLivraison;

        $SuivieCommande->save();
       
        Session::forget('cart');
        Session::forget('topCart');
        Session::forget('CodePromo');
        Session::forget('ValeurPromo');

        return view('client.checkout-complete');
    }

    public function order($numero){

        $infocommande = SuivieCommande::where('ref_commande',$numero)->first();
        if($infocommande){

            $detailcommande = DB::table('suivie_commandes')->join('commandes', 'suivie_commandes.ref_commande', '=', 'commandes.ref_commande')
                                               ->where('suivie_commandes.ref_commande', $infocommande->ref_commande)
                                               ->first();
                                               
            $transactions = DB::table('transactions')->join('commandes', 'transactions.commande_id', '=', 'commandes.id')
                                                    ->where('commandes.ref_commande', $infocommande->ref_commande)
                                                    ->select('transactions.id', 'transactions.ref_transaction')
                                                    ->selectRaw('(LENGTH(contenue) - LENGTH(REPLACE(contenue, ?, ?))) / LENGTH(?) as total_elements', ['"statut":0', '', '"statut":0'])
                                                    ->selectRaw('(LENGTH(contenue) - LENGTH(REPLACE(contenue, ?, ?))) / LENGTH(?) as count_non_zero_status', ['"statut":1', '', '"statut":1'])
                                                    ->get();

            // $detailcommande = SuivieCommande::where('ref_commande',$infocommande->ref_commande)->first();
            return view('client.order-tracking',['detailcommande' => $detailcommande,
                                                'suivie' => $transactions
                                                ]);
        }

    }

    public function ordercommande(Request $request){
            
        $infocommande = SuivieCommande::where('ref_commande',$request->input('NumeroCommande'))->first();

        $transactions = DB::table('transactions')->join('commandes', 'transactions.commande_id', '=', 'commandes.id')
                                                    ->where('commandes.ref_commande', $infocommande->ref_commande)
                                                    ->select('transactions.id', 'transactions.ref_transaction')
                                                    ->selectRaw('(LENGTH(contenue) - LENGTH(REPLACE(contenue, ?, ?))) / LENGTH(?) as total_elements', ['"statut":0', '', '"statut":0'])
                                                    ->selectRaw('(LENGTH(contenue) - LENGTH(REPLACE(contenue, ?, ?))) / LENGTH(?) as count_non_zero_status', ['"statut":1', '', '"statut":1'])
                                                    ->get();
        
        if($infocommande){
            $detailcommande = SuivieCommande::where('ref_commande',$request->input('NumeroCommande'))->first();
             return view('client.order-tracking',['detailcommande' => $detailcommande,
                                                     'suivie' => $transactions
                                                ]);
        }
    }
    
    public function resetPasswordForget(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:clients,email',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $client = ClientModel::where('email', $request->email)->first();

        if (!$client) {
            return response()->json(['message' => 'Client non trouvé'], 404);
        }else {
            # code...
            $token = Str::random(60);

            $client->update([
                'password' => null,
                'token' => $token, 
            ]);
        

            DB::beginTransaction();

            try {
                

                $mailjetClient = new Client([
                    'base_uri' => 'https://api.mailjet.com/v3.1/',
                ]);

                $response = $mailjetClient->request('POST', 'send', [
                    'json' => [
                        'Messages' => [
                            [
                                'From' => [
                                    'Email' => "aye.okaingne@uvci.edu.ci",
                                    'Name' => "alice"
                                ],
                                'To' => [
                                    [
                                        'Email' => $client->email,
                                        'Name' => $client->nom
                                    ]
                                ],
                                'TemplateID' => 6265924,
                                'TemplateLanguage' => true,
                                'Subject' => "Réinitialisation de mot de passe",
                                'Variables' => [
                                    'name' => $client->nom,
                                    'token' => $token
                                ]
                            ]
                        ]
                    ],
                    'auth' => [config('services.mailjet.key'), config('services.mailjet.secret')]
                ]);

                if ($response->getStatusCode() != 200 || json_decode((string) $response->getBody())->Messages[0]->Status != 'success') {
                    throw new \Exception('Échec de envoi de email');
                }

                DB::commit();
                return view('client.mail-send');

            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['message' => 'Une erreur est survenue lors de envoi de email.'], 500);
            }

        }
    }

    public function NewPassword(Request $request){

        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'password' => 'required|string|confirmed|min:8'
        ]);

        if ($validator->fails()) {
            return back()->with('error','mauvais mot de passe ou non conforme');
        }

        $Client = ClientModel::where('token', $request->input('token'))->first();

            if (!$Client) {
                return back()->with('error','error lors de la renitialisation du mot de passe, veuillez réessayer plus tard ou contacter le service clientèle.');
            }else {
                # code... 
                $Client->update([
                    'token' => null,
                    'password' =>bcrypt($request->input('password')),
                ]);

                return redirect('/client/signin');
                
            }

    }



}
