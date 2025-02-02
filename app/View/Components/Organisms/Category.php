<?php

namespace App\View\Components\Organisms;

use Illuminate\View\Component;

class Category extends Component
{
    
     public $dataCategory;

    public function __construct($dataCategory)
    {
        $this->dataCategory = $dataCategory;
    }

    public function render()
    {
        return view('client.components.organisms.category');
    }
}
