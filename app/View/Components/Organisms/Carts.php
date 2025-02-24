<?php

namespace App\View\Components\Organisms;

use Illuminate\View\Component;

// Composant Organism - Panier
// Section complète du panier

class Carts extends Component
{
    
    public function __construct()
    {
        
    }

    public function render()
    {
        return view('client.components.organisms.carts');
    }
}
