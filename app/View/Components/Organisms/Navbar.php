<?php

namespace App\View\Components\Organisms;

use Illuminate\View\Component;

// Composant Organism - Barre de navigation
// Navigation principale

class Navbar extends Component
{
    
     public  $path;

    public function __construct( $path)
    {
        $this->path = $path;
    }

    public function render()
    {
        return view('client.components.organisms.navbar');
    }
}
