<?php

namespace App\View\Components\Molecules\Hero;

use Illuminate\View\Component;

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
