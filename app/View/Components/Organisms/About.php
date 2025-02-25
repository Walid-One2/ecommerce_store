<?php

namespace App\View\Components\Organisms;

use Illuminate\View\Component;

// Composant Organism - À propos
// Section complète À propos

class About extends Component
{
    
    public function __construct()
    {
        
    }

    public function render()
    {
        return view('client.components.organisms.about');
    }
}
