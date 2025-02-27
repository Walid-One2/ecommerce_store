<?php

namespace App\View\Components\Molecules\ProductDetail;

use Illuminate\View\Component;

// Composant Molecule ProductDetail - Images
// Galerie d'images produit

class ProductImages extends Component
{
    
    public $dataProductimages;
    public function __construct($dataProductimages)
    {
        $this->dataProductimages = $dataProductimages;
    }

    public function render()
    {
        return view('client.components.molecules.product-detail.product-images');
    }
}
