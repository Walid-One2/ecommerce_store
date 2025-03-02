<?php

namespace App\View\Components\Molecules\About;

use Illuminate\View\Component;

// Composant Molecule About - Livraison et retours
// Politique de livraison

class ShippingReturns extends Component
{
    
    public function __construct()
    {
        
    }

    public function render()
    {
        return view('client.components.molecules.about.shipping-returns');
    }
}
