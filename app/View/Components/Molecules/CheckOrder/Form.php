<?php

namespace App\View\Components\Molecules\CheckOrder;

use Illuminate\View\Component;

// Composant Molecule CheckOrder - Formulaire
// Formulaire de vérification commande

class Form extends Component
{
    
    public function __construct()
    {
        
    }

    public function render()
    {
        return view('client.components.molecules.check-order.form');
    }
}
