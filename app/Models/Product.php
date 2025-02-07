<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Modèle Product - Produit
// Représente un produit du catalogue

class Product extends Model
{
    
    protected $fillable = ['category_id', 'title', 'desc', 'price', 'stock'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function productImage(){
        return $this->hasMany(ProductImage::class);
    }

    use HasFactory;
}
