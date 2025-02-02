<?php

namespace App\View\Components\Molecules;

use Illuminate\View\Component;

class ChoosenBlock extends Component
{
    
     public $icon, $title, $desc, $bg;

    public function __construct($icon, $title, $desc, $bg)
    {
        $this->icon = $icon;
        $this->title = $title;
        $this->desc = $desc;
        $this->bg = $bg;
    }

    public function render()
    {
        return view('client.components.molecules.choosen-block');
    }
}
