<?php

namespace App\View\Components\Molecules\ProductDetail;

use Illuminate\View\Component;

class ProductContent extends Component
{
    
    public $dataProductContent;
    public function __construct($dataProductContent)
    {
        $this->dataProductContent = $dataProductContent;
    }

    public function render()
    {
        return view('client.components.molecules.product-detail.product-content');
    }
}
