<?php

namespace App\View\Components\Organisms;

use Illuminate\View\Component;

// Composant Organism - Réductions
// Section promotions

class Discounts extends Component
{
    
    public function __construct()
    {
        
    }

    public function render()
    {
        return view('client.components.organisms.discounts');
    }
}
