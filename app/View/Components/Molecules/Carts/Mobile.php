<?php

namespace App\View\Components\Molecules\Carts;

use Illuminate\View\Component;

// Composant Molecule Cart - Version mobile
// Panier pour mobile

class Mobile extends Component
{
    
    public function __construct()
    {
        
    }

    public function render()
    {
        return view('client.components.molecules.carts.mobile');
    }
}
