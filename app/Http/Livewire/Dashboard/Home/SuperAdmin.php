<?php

namespace App\Http\Livewire\Dashboard\Home;

use App\Models\Order;
use App\Models\RealEstate;
use Livewire\Component;

class SuperAdmin extends Component
{

    public $unReviewOrder;
    public $unReviewRealEstate;
    public function mount()
    {
        $this->unReviewOrder = Order::notReview()->count();
        $this->unReviewRealEstate = RealEstate::notReview()->count();
    }
    public function render()
    {
        return view('livewire.dashboard.home.super-admin');
    }
}
