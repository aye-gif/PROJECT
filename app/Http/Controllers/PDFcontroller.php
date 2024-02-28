<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\DB;
use App\Models\Commande;
use Illuminate\Http\Request;

class PDFcontroller extends Controller
{
    //
    public function VoirPdf($id){

        Session::put('id', $id);

        try {
            $html = $this->convert_orders_data_to_html();
            //code...
            $pdf = new Dompdf();
            // $pdf = storage_path('fonts/DejaVuSerif.ufm');
            // $pdf->setPaper('A4', 'portrait');

            // Charger le contenu HTML dans Dompdf
            $pdf->loadHtml($html);

            // Rendre le PDF
            $pdf->render();

            // Générer le nom du fichier PDF
            $nomFichier = 'text.pdf';

            return $pdf->stream($nomFichier);

        } catch (Exception $e) {
            //throw $th;
            return redirect('/orders')->with('error', $e->gettMessage());
        }
    }

    public function convert_orders_data_to_html(){

        $affiche_comandes = Commande::where('id', Session::get('id'))->get();

        foreach ($affiche_comandes as $order) {
            # code...

            $nom_client = $order->nom_client;
            $prenom_client = $order->prenom_client;
            $ref_commande = $order->ref_commande;
            $adresse = $order->adresse;
            $date = $order->created_at;
        }

        $affiche_comandes->transform(function($affiche_cart, $key){
                    $affiche_cart->cart = unserialize($affiche_cart->cart);
 
                return $affiche_cart;
            });
        $output = '
        <html>
        <head>
            <title>Exemplaire de facture</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                }
                
                .container {
                    width: 600px;
                    margin: 0 auto;
                }
                
                .header {
                    text-align: center;
                    padding: 20px;
                    background-color: #f2f2f2;
                }
                
                .invoice-details {
                    margin-bottom: 20px;
                }
                
                .invoice-details h2 {
                    margin: 0;
                    font-size: 24px;
                }
                
                .invoice-details p {
                    margin: 5px 0;
                    font-size: 14px;
                }
                
                .invoice-items {
                    width: 100%;
                    border-collapse: collapse;
                }
                
                .invoice-items th,
                .invoice-items td {
                    padding: 10px;
                    margin: 10px;
                    text-align: center;
                    border-bottom: 1px solid #ddd;
                }
                
                .invoice-items th {
                    background-color: #f2f2f2;
                }
                
                .total {
                    text-align: right;
                    margin-top: 20px;
                }
                .signature {
                    text-align: right;
                    margin-top: 50px;
                }
                .signature span {
                    font-weight: bold;
                    text-decoration: underline;
                }
                .total span {
                    font-weight: bold;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h1>FACTURE</h1>
                </div>
                
                <div class="invoice-details">
                    <h2></h2>
                    <p>Numéro de facture : '.$ref_commande. '</p>
                    <p>Date : '.$date. '</p>
                    <p>Client : '.$nom_client." ".$prenom_client. '</p>
                </div>
                
                <table class="invoice-items">
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Prix unitaire</th>
                            <th>Quantité</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>';
                    foreach ($affiche_comandes as $order) {
                        //                     # code...
                             foreach ($order->cart->items as $item) {
                                $output .= '<tr>
                                                <td>'.$item['product_name'].'</td>
                                                <td>'.number_format($item['product_price'],0,",",".").'<small>'." Fr".'</small>'.'</td>
                                                <td>'.$item['qty'].'</td>
                                                <td>'.number_format($item['product_price'] * $item['qty'],0,",",".").'<small>'." Fr".'</small>'.'</td>
                                            </tr>
                                    </tbody>';
                             }
                             $totalPrice = $order->cart->totalPrice;
                        }
                $output .= '</table>';
                
                $output .= ' <div class="total">
                    <span>Total :</span>'." ".number_format($totalPrice,0,",",".").'<small>'." Fr".'</small>'.'
                </div>';

                $output .= ' <div class="signature">
                    <span>Signature client</span>
                </div>
            </div>
        </body>
        </html>';
        return $output;
        // $output = '<link rel="stylesheet" type="text/css" href="assets/css/style.css">
        //         <table classe="table">
        //             <thead class="thead">
        //                 <tr class="text-left>"
        //                     <th> Client Name :  '.$nom_client. '<br> Client Adresses :'.$adresse.'<br> Date : '.$date.'</th>
        //                 </tr>
        //             </thead>
        //         </table>
        //         <table classe="table">
        //             <thead class="thead-primary">
        //                 <tr class="text-center>
        //                     <th>Image</th> 
        //                     <th>Produit name</th> 
        //                     <th>Price</th> 
        //                     <th>Quantite</th> 
        //                     <th>Total</th> 
        //                 </tr>
        //             </thead>
        //             <tbody>';

        //                 foreach ($affiche_comandes as $order) {
        //                     # code...

        //                     foreach ($order->cart->items as $item) {
        //                         # code...

        //                         $output .= '<tr class="text-center">
        //                                         <td class="image-prod"><img src="storage/productimages'.$item['product_image'].'" alt="" style= "height: 80px; width: 80px;"></td>
        //                                         <td class="product-name">
        //                                             <h3>'.$item['product_name'].'</h3>
        //                                         </td>
        //                                         <td class="price">$ '.$item['product_price'].'</td>
        //                                         <td class="qty">'.$item['qty'].'<td>
        //                                         <td class="total">$ '.$item['product_price']*$item['qty'].'<td>
        //                                     </tr>
        //                                     <tbody>';
        //                     }

        //                         $totalPrice = $order->cart->totalPrice;
        //                 }

        //                 $output .= '</table>';

        //                 $output .= '<table class="table">
        //                                 <thead class="thead">
        //                                         <tr class="text-center">
        //                                             <th>Total</th>
        //                                             <th>$ '.$totalPrice.'</th>
        //                                         </tr> 
        //                                 </thead>
        //                             </table>';
                        
        //             return $output;

    }

    public function VoirPdf2($id){

            // Créer une instance de Dompdf
        $dompdf = new Dompdf();

        // Générer le contenu HTML du PDF
        $html = '<html><body><h1>Mon fichier PDF</h1><p>Ceci est un exemple de fichier PDF généré avec Laravel.</p></body></html>';

        // Charger le contenu HTML dans Dompdf
        $dompdf->loadHtml($html);

        // Rendre le PDF
        $dompdf->render();

        // Générer le nom du fichier PDF
        $nomFichier = 'essaie.pdf';

        // Envoyer le PDF au navigateur pour le téléchargement
        return $dompdf->stream($nomFichier);
    }

}
