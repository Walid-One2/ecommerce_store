<?php

namespace App\View\Components\Organisms;

use Illuminate\View\Component;

// Composant Organism - Carrousel catégories
// Carrousel de catégories

class CarouselCategory extends Component
{
    
    public $category;
    public function __construct($category)
    {
        $this->category = $category;
    }

    public function render()
    {
        return view('client.components.organisms.carousel-category');
    }
}
