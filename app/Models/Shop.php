<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Modèle Shop - Boutique
// Paramètres et informations de la boutique

class Shop extends Model
{
    protected $fillable = ['user_id', 'name_shop', 'desc', 'phone', 'address', 'path'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->hasMany(Category::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }

    use HasFactory;
}
