<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Modèle Order - Commande
// Représente une commande client

class Order extends Model
{
    protected $fillable = ['shop_id', 'order_code', 'name', 'phone', 'address', 'note', 'total', 'status'];

    public function shop(){
        return $this->belongsTo(Shop::class);
    }

    use HasFactory;
}
