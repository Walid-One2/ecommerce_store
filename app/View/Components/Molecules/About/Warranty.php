<?php

namespace App\View\Components\Molecules\About;

use Illuminate\View\Component;

// Composant Molecule About - Garantie
// Informations sur les garanties

class Warranty extends Component
{
    
    public function __construct()
    {
        
    }

    public function render()
    {
        return view('client.components.molecules.about.warranty');
    }
}
