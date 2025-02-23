<?php

namespace App\View\Components\Organisms;

use Illuminate\View\Component;

// Composant Organism - Pied de page
// Footer du site

class Footer extends Component
{
    
     public $shop;

    public function __construct($shop)
    {
        $this->shop = $shop;
    }

    public function render()
    {
        return view('client.components.organisms.footer');
    }
}
