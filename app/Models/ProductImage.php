<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Modèle ProductImage - Image produit
// Images associées à un produit

class ProductImage extends Model
{

    protected $fillable = ['product_id', 'path'];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    use HasFactory;
}
