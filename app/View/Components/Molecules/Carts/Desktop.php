<?php

namespace App\View\Components\Molecules\Carts;

use Illuminate\View\Component;

// Composant Molecule Cart - Version desktop
// Panier pour écrans larges

class Desktop extends Component
{
    
    public function __construct()
    {
        
    }

    public function render()
    {
        return view('client.components.molecules.carts.desktop');
    }
}
