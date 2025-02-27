<?php

namespace App\View\Components\Molecules\Hero;

use Illuminate\View\Component;

// Composant Molecule Hero - Bloc texte
// Texte promotionnel du héro

class TextBlock extends Component
{
    
    public function __construct()
    {
        
    }

    public function render()
    {
        return view('client.components.molecules.hero.text-block');
    }
}
