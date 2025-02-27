<?php

namespace App\View\Components\Molecules\Hero;

use Illuminate\View\Component;

// Composant Molecule Hero - Carte produit héro
// Produit mis en avant dans le héro

class CardProduct extends Component
{
    
    public $title, $dataImage;
    public function __construct($title, $dataImage)
    {
        $this->title = $title;
        $this->dataImage = $dataImage;
    }

    public function render()
    {
        return view('client.components.molecules.hero.card-product');
    }
}
