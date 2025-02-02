<?php

namespace App\View\Components\Molecules\ProductDetail;

use Illuminate\View\Component;

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
