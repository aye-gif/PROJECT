<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuivieCommande extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref_suivie_commande',
        'ref_commande',
        'methode_livraison',
        'statut',
        'date_livraison',
    ];
}
