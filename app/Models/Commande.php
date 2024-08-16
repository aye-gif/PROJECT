<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref_commande',
        'info_adresse_id',
        'client_id',
        'mode_livraison',
        'nombreJour',
        'reste',
        'methode_paiement',
        'statut',
        'cart',
    ];
}
