<?php

namespace App\View\Components\Molecules\About;

use Illuminate\View\Component;

// Composant Molecule About - Adresse
// Affichage de l'adresse de contact

class Address extends Component
{
    
    public function __construct()
    {
        
    }

    public function render()
    {
        return view('client.components.molecules.about.address');
    }
}
