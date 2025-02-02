<?php

namespace App\View\Components\Molecules\CheckOrder;

use Illuminate\View\Component;

class Form extends Component
{
    
    public function __construct()
    {
        
    }

    public function render()
    {
        return view('client.components.molecules.check-order.form');
    }
}
