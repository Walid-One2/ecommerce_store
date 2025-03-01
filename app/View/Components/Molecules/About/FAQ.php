<?php

namespace App\View\Components\Molecules\About;

use Illuminate\View\Component;

// Composant Molecule About - FAQ
// Questions fréquemment posées

class FAQ extends Component
{
    
    public function __construct()
    {
        
    }

    public function render()
    {
        return view('client.components.molecules.about.f-a-q');
    }
}
