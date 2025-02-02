<?php

namespace App\View\Components\Molecules\CheckOrder;

use Illuminate\View\Component;

class Data extends Component
{
    
     public $order, $orderDetail;

    public function __construct($order, $orderDetail)
    {
        $this->order = $order;
        $this->orderDetail = $orderDetail;
    }

    public function render()
    {
        return view('client.components.molecules.check-order.data');
    }
}
