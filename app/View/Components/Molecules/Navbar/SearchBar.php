<?php

namespace App\View\Components\Molecules\Navbar;

use Illuminate\View\Component;

// Composant Molecule Navbar - Barre de recherche
// Recherche de produits

class SearchBar extends Component
{
    
    public function __construct()
    {
        
    }

    public function render()
    {
        return view('client.components.molecules.navbar.search-bar');
    }
}
