<?php

namespace App\Http\Livewire\Dashboard\Orders;

use App\Models\Order;
use Livewire\Component;

class Show extends Component
{

    public $order;

    public function mount(Order $order)
    {
        $this->order = $order;
    }

    public function render()
    {
        return view('livewire.dashboard.orders.show');
    }
}
