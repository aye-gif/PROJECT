<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HeaderControleur;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PagesAjoutController;
use App\Http\Controllers\PDFcontroller;
use App\Http\Controllers\PagesModifieController;
use App\Http\Controllers\PaiementCinetpayController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
                //..... en ce qui concerne le system recherche

    Route::POST('/recherche', [PagesController::class, 'recherche']);
    

                //..... en ce qui les pages de cote administrateur

    //pour acceder a la page de connexion admin
    Route::get('/dashboard', [AdminController::class, 'dashboard']);

    //pour acceder a la page de connexion admin
    Route::get('/admin', [AdminController::class, 'admin']);

    //pour acceder au tableau de bord admin
    Route::post('/adminaccount', [AdminController::class, 'adminaccount']);

     //pour acceder au tableau de bord admin
     Route::get('/admin/ListeTransaction', [AdminController::class, 'ListeTransaction']);

    //pour acceder au tableau de bord admin
    Route::get('/admin/ListeSuivieCommande', [AdminController::class, 'ListeSuivieCommande']);
                    //pour modifier un suivie commande
                     Route::get('/admin/ModifierSuivieCommande/{id}', [PagesModifieController::class, 'ModifierSuivieCommande']);

    //pour acceder a la page commandes
    Route::get('/admin/ListeCommande', [AdminController::class, 'ListeCommande']);
                    //pour voir le client qui vient d'effectuer une commande
                    Route::get('/admin/VoirClient/{info_adresse}', [AdminController::class, 'VoirClient']);

    //pour acceder a la page produit
    Route::get('/admin/ListeArticle', [AdminController::class, 'ListeArticle']);
                    //pour ajouter un article
                    Route::post('/admin/NewArticle', [PagesAjoutController::class, 'NewArticle']); 
                    
                    //pour ajouter un article
                    Route::get('/admin/VoirArticle/{id}', [AdminController::class, 'VoirArticle']); 

    //pour acceder a la page ajouter un article dans la base de donnee
    Route::get('/admin/AjouterArticle', [AdminController::class, 'AjouterArticle']);

    //pour acceder a la page ajouter une categorie dans la base de donnee
    Route::get('/admin/AjouterCategorie', [AdminController::class, 'AjouterCategorie']);

                    //pour ajouter une categorie
                    Route::post('/admin/NewCategorie', [PagesAjoutController::class, 'NewCategorie']);

    //pour acceder a la page ajouter une détail dans la base de donnee
    Route::get('/admin/AjouterDetail', [AdminController::class, 'AjouterDetail']);
                    //pour ajouter un detail
                    Route::post('/admin/NewDetail', [PagesAjoutController::class, 'NewDetail']);
    
    //pour acceder a la page ajouter une taille dans la base de donnee
    Route::get('/admin/AjouterTaille', [AdminController::class, 'AjouterTaille']);
                    //pour ajouter une taille
                    Route::post('/admin/NewTaille', [PagesAjoutController::class, 'NewTaille']);

    //pour acceder a la page ajouter une marque dans la base de donnee
    Route::get('/admin/AjouterMarque', [AdminController::class, 'AjouterMarque']);

                    //pour acceder a la page ajouter une marque
                    Route::post('/admin/NewMarque', [PagesAjoutController::class, 'NewMarque']);

    //pour acceder a la page ajouter un fournisseur dans la base de donnee
    Route::get('/admin/AjouterFournisseur', [AdminController::class, 'AjouterFournisseur']);

                    //pour acceder a la page ajouter un fournisseur
                    Route::post('/admin/NewFournisseur', [PagesAjoutController::class, 'NewFournisseur']);

    //pour voir le pdf  de la commande passer
    Route::get('/admin/VoirCommande/{id}', [PDFcontroller::class, 'VoirPdf']);

    //pour 
    Route::get('/admin/ListeClient', [AdminController::class, 'ListeClient']);

    //pour 
    Route::get('/admin/infoCommande/{id}', [AdminController::class, 'infoCommande']);

    //pour 
    Route::get('/admin/voirCommande/{id}', [AdminController::class, 'voirCommande']);

    //pour 
    Route::get('/admin/etapeCommande/{ref_commande}', [AdminController::class, 'etapeCommande']);

    //pour 
    Route::get('/admin/infoTransaction/{id}', [AdminController::class, 'infoTransaction']);

    //pour 
    Route::post('/admin/Search/transaction', [AdminController::class, 'SearchTransaction']);

    //pour 
    Route::get('/admin/TransactionValidate/{transactionId}/{IdContenu}', [AdminController::class, 'TransactionValidate']);

                 //..... en ce qui les pages qui manipulation des articles et autres

    //pour gere le corp de ma page
    Route::get('/', [PagesController::class, 'home']);
    

    //pour avoir acces a la page checkout-details
    Route::get('/client/checkout', [ClientController::class, 'checkout']);

    //pour avoir acces a la page checkout-paiement
    Route::get('/client/paiement', [ClientController::class, 'paiement']);

    //pour avoir acces a la pages paiement de cinetpay
    Route::get('/client/cinetpay', [PaiementCinetpayController::class, 'cinetpay']);

    //pour gerer le code promo
    Route::post('/CodePromo', [ClientController::class, 'CodePromo']);

    //pour gere la methode de livraison
    Route::post('/client/Expedition', [ClientController::class, 'Expedition']);

    //pour gere la page qui resume la commande
    Route::get('/client/review', [ClientController::class, 'review']);

    //pour gere la methode de livraison
    Route::get('/client/shipping', [ClientController::class, 'shipping']);

    //pour gere la methode de paiement
    Route::post('/client/MethodPay', [ClientController::class, 'MethodPay']);

    //pour gere les favories
    Route::get('/favories/{id_article}', [ClientController::class, 'favories']);

    //pour afficher la page vois plus d'article
    Route::get('/plus', [PagesController::class, 'plus']);

    //pour afficher la page vois plus d'article
    Route::get('/cart', [PagesController::class, 'cart']);

    // pour afficher les informations sur un article selectionner
    Route::get('article/{id}', [PagesController::class, 'info']);

    // pour afficher les articles de meme type et categorie
    Route::get('/type/{type_article}', [PagesController::class, 'type']);

    // pour afficher les articles de meme type et categorie
    Route::get('/resetpwd/{token}', [PagesController::class, 'resetpwd']);

    // pour gerer le mot de pass oublié
    Route::get('/client/PasswordForget', [PagesController::class, 'PasswordForget']);

    // pour gerer le mot de pass oublié
    Route::post('/client/reset/PasswordForget', [ClientController::class, 'ResetPasswordForget']);

    // pour gerer le mot de pass oublié
    Route::post('/client/password/reset', [ClientController::class, 'NewPassword']);

   


                     //..... en ce qui concerne le client

    //pour pour acceder a la page
    Route::get('/client/signin', [ClientController::class, 'signin']);

    //pour pour la creaction du compte client
    Route::post('/createaccount', [ClientController::class, 'createaccount']);

    //pour pour acceder au du compte client
    Route::post('/accessaccount', [ClientController::class, 'accessaccount']);

    //aller a la page du compte client
    Route::get('/client/account/{ref_client}', [ClientController::class, 'account']);

    //aller a la page favories directement
    Route::get('/client/account/favories/{ref_client}', [ClientController::class, 'AccountFavories']);

    //..... en ce qui concerne les info presentent dans le compte du client

    //aller a la page du compte client
    Route::put('/client/ModifInfoClient/{id}', [ClientController::class, 'ModifInfoClient']);

    
    //pour accede a la page orders etant dans le compte du client
    Route::get('/client/orders', [ClientController::class, 'orders']);
    Route::get('/client/wishlist/{id_client}', [ClientController::class, 'wishlist']);
    Route::get('/client/tickets', [ClientController::class, 'tickets']);
    Route::get('/client/address', [ClientController::class, 'address']);
    Route::get('/client/payment', [ClientController::class, 'payment']);

   //pour ce deconecter du compte client
   Route::get('/client/logout', [ClientController::class, 'logout']);

   
   //pour supprimer un article dans present dans les favories
   Route::get('/client/wishlist/Remove/{article_id}', [ClientController::class, 'RemoveFavorie']);

   
                        //..... en ce qui concerne le panier

    // pour gerer l'ajout au panier
    Route::put('/addtocart/{id}', [CartController::class, 'addtocart']);

    // pour gerer l'ajout au panier
    Route::post('/addtocart2', [CartController::class, 'addtocart2']);

    // pour actualiser la quantite d'un aticle dans le panier
    Route::put('/cart/updateqty/{id}', [CartController::class, 'updateqty']);

    // pour supprimer aticle dans le panier
    Route::get('/cart/removeItem/{id}', [CartController::class, 'removeItem']);

    // pour supprimer aticle dans le panier
    Route::post('/PlusInfo', [ClientController::class, 'PlusInfo']);

    // pour valider une commande
    Route::post('/client/ValidateCommande', [ClientController::class, 'ValidateCommande']); 

    // pour permettre au client de suivre sa commade par la methode get
    Route::get('/client/order/{numero}', [ClientController::class, 'order']);
    
    // pour permettre au client de suivre sa commade par la methode post
    Route::post('/client/ordercommande', [ClientController::class, 'ordercommande']);

                        //..... en ce qui concerne les commentaire

    // pour enregistrer un commentaire
    Route::put('/addtocomment', [PagesController::class, 'addtocomment']);

    // en ce qui concerne le like d'un commentaire
    Route::get('/CommentLike/{id}', [PagesController::class, 'LikeCommentaire']);

    // en ce qui concerne le Dislike d'un commentaire
    Route::get('/CommentDislike/{id}', [PagesController::class, 'DislikeCommentaire']);




    

    


