<?php

namespace App\View\Components\Molecules;

use Illuminate\View\Component;

class CategoryCard extends Component
{
    
     public $path, $name, $width;

    public function __construct($path, $name, $width = null)
    {
        $this->path = $path;
        $this->name = $name;
        $this->width = $width ?? "100%";
    }

    public function render()
    {
        return view('client.components.molecules.category-card');
    }
}
