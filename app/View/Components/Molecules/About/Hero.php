<?php

namespace App\View\Components\Molecules\About;

use Illuminate\View\Component;

// Composant Organism - Héro
// Bannière principale

class Hero extends Component
{
    
     public $shop;

    public function __construct($shop)
    {
        $this->shop = $shop;
    }

    public function render()
    {
        return view('client.components.molecules.about.hero');
    }
}
