<?php

namespace App\View\Components\Organisms;

use Illuminate\View\Component;

// Composant Organism - Détail produit
// Page complète produit

class ProductDetail extends Component
{
    
    public $dataProduct;
    public function __construct($dataProduct) 
    {
        $this->dataProduct = $dataProduct;
    }

    public function render()
    {
        return view('client.components.organisms.product-detail');
    }
}
