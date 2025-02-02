<?php

namespace App\View\Components\Organisms;

use Illuminate\View\Component;

class Hero extends Component
{
    
     public $dataProduct;

    public function __construct($dataProduct)
    {
        $this->dataProduct = $dataProduct;
    }

    public function render()
    {
        return view('client.components.organisms.hero');
    }
}
