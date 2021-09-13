<?php

namespace App\Http\Livewire\Dashboard\Home;

use App\Models\Order;
use App\Models\RealEstate;
use Livewire\Component;

class SuperAdmin extends Component
{

    public $unReviewOrders;
    public $unReviewRealEstates;
    public $totalRealEstates;
    public $totalOrders;

    public function mount()
    {
        $this->unReviewOrders = Order::notReview()->count();
        $this->totalOrders = Order::review()->count();
        $this->unReviewRealEstates = RealEstate::notReview()->count();
        $this->totalRealEstates = RealEstate::review()->count();
    }
    public function render()
    {
        return view('livewire.dashboard.home.super-admin');
    }
}
