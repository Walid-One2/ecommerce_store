<?php

namespace App\View\Components\Molecules;

use Illuminate\View\Component;

// Composant Molecule - Carte produit
// Affichage d'un produit

class ProductCard extends Component
{
    
     public $image, $category, $title, $price;

    public function __construct($image, $category, $title, $price)
    {
        $this->image = $image;
        $this->category = $category;
        $this->title = $title;
        $this->price = $price;
    }

    public function render()
    {
        return view('client.components.molecules.product-card');
    }
}
