<?php

namespace App\View\Components\Organisms;

use Illuminate\View\Component;

// Composant Organism - Pourquoi nous choisir
// Section arguments de vente

class ChoosenUs extends Component
{
    
    public function __construct()
    {
        
    }

    public function render()
    {
        return view('client.components.organisms.choosen-us');
    }
}
