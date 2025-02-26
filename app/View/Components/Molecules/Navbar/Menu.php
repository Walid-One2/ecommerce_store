<?php

namespace App\View\Components\Molecules\Navbar;

use Illuminate\View\Component;

// Composant Molecule Navbar - Menu
// Menu de navigation

class Menu extends Component
{
    
    public function __construct()
    {
        
    }

    public function render()
    {
        return view('client.components.molecules.navbar.menu');
    }
}
