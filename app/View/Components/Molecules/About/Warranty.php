<?php

namespace App\View\Components\Molecules\About;

use Illuminate\View\Component;

class Warranty extends Component
{
    
    public function __construct()
    {
        
    }

    public function render()
    {
        return view('client.components.molecules.about.warranty');
    }
}
