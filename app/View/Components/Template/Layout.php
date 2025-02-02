<?php

namespace App\View\Components\Template;

use Illuminate\View\Component;

class Layout extends Component
{
    
     public $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function render()
    {
        return view('client.components.template.layout');
    }
}
