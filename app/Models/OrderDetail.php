<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Modèle OrderDetail - Détail de commande
// Ligne de commande (produit + quantité)

class OrderDetail extends Model
{
    protected $fillable = ['order_code', 'title', 'price', 'quantity'];

    use HasFactory;
}
