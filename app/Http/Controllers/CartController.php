<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\Info_adresse;
use App\Models\Cart;

class CartController extends Controller
{
    //pour la creation de mon panier
    public function addtocart(Request $request, $id){

        
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($id,$request->libelle_article,$request->image_article,$request->prix, $request->taille_article,$request->couleur);
        Session::put('cart', $cart);
        Session::put('topCart', $cart->items);

        return back();
    }
    //pour la creation de mon panier
    public function addtocart2(Request $request){

        
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($request->id,$request->libelle_article,$request->image_article,$request->prix, $request->taille_article,$request->couleur);
        Session::put('cart', $cart);
        Session::put('topCart', $cart->items);

        return back();
    }

    // pour la modification d'un article dans le panier
    public function updateqty(Request $request, $id){

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->updateQty($id, $request->qty);
        Session::put('cart', $cart);
        Session::put('topCart', $cart->items);

        return back();
    }
    // pour supprimer un article dans le panier
    public function removeItem($id){

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        Session::put('cart', $cart);
        Session::put('topCart', $cart->items);

        return back();
    }

    
}
