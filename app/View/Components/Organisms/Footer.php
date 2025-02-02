<?php

namespace App\View\Components\Organisms;

use Illuminate\View\Component;

class Footer extends Component
{
    
     public $shop;

    public function __construct($shop)
    {
        $this->shop = $shop;
    }

    public function render()
    {
        return view('client.components.organisms.footer');
    }
}
