<?php

namespace App\View\Components\Molecules;

use Illuminate\View\Component;

class DiscountBlock extends Component
{
    
     public $background, $discount, $item, $image;

    public function __construct($background, $discount, $item, $image)
    {
        $this->background = $background;
        $this->discount = $discount;
        $this->item = $item;
        $this->image = $image;
    }

    public function render()
    {
        return view('client.components.molecules.discount-block');
    }
}
