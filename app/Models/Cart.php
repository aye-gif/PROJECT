<?php

namespace App\Models;

    class Cart{

        public $items = null;
        public $totalQty = 0;
        public $totalPrice = 0;


        public function __construct($oldCart){

            if ($oldCart) {
                # code...
                $this->items = $oldCart->items;
                $this->totalQty = $oldCart->totalQty;
                $this->totalPrice = $oldCart->totalPrice;
            }
        }

        public function add($id,$libelle_article,$image_article,$prix,$taille_article,$couleur){
            $storedItem = [
                'qty' => 0,
                'product_id' => $id.$taille_article.$couleur,
                'product_name' => $libelle_article,
                'product_price' => $prix,
                'product_image' => $image_article,
                'product_taille_article' => $taille_article,
                'product_couleur' => $couleur,
                
            ];

            if ($this->items) {
                # code...
                if (array_key_exists($id.$taille_article.$couleur, $this->items)) {
                    # code...
                    $storedItem = $this->items[$id.$taille_article.$couleur];
                }
            }

            $storedItem['qty']++;
            $storedItem['product_id'] = $id.$taille_article.$couleur;
            $storedItem['product_name'] = $libelle_article;
            $storedItem['product_price'] = $prix;
            $storedItem['product_image'] = $image_article;
            $storedItem['product_taille_article'] = $taille_article;
            $storedItem['product_couleur'] = $couleur;
            $this->totalQty++;
            $this->totalPrice += $prix;
            $this->items[$id.$taille_article.$couleur] = $storedItem;
        }

        public function updateQty($id, $qty){

            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['product_price'] * $this->items[$id]['qty'];
            $this->items[$id]['qty'] = $qty;
            $this->totalQty += $qty;
            $this->totalPrice += $this->items[$id]['product_price'] * $qty;
        }

        public function removeItem($id){
            
            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['product_price'] * $this->items[$id]['qty'];
            unset($this->items[$id]);
        }
    }