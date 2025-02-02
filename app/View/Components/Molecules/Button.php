<?php

namespace App\View\Components\Molecules;

use Illuminate\View\Component;

class Button extends Component
{
    
     public $text, $arrow, $type, $icon, $align, $size, $link;

    public function __construct($text = null, $arrow = false, $type = null, $icon = null, $align = null, $size = null, $link = null)
    {
        $this->text = $text;
        $this->arrow = $arrow;
        $this->type = $type ?? "primary";
        $this->icon = $icon;
        $this->align = $align ?? "start";
        $this->size = $size ?? "lg";
        $this->link = $link;
    }

    public function render()
    {
        return view('client.components.molecules.button');
    }
}
