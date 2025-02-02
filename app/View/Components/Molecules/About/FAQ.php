<?php

namespace App\View\Components\Molecules\About;

use Illuminate\View\Component;

class FAQ extends Component
{
    
    public function __construct()
    {
        
    }

    public function render()
    {
        return view('client.components.molecules.about.f-a-q');
    }
}
