<?php

namespace App\View\Components\Organisms;

use Illuminate\View\Component;

// Composant Organism - Liste produits
// Grille de produits

class Products extends Component
{
    
     public $dataProduct;

    public function __construct($dataProduct)
    {
        $this->dataProduct = $dataProduct;
    }

    public function render()
    {
        return view('client.components.organisms.products');
    }
}
