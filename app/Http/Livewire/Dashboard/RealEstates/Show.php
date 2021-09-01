<?php

namespace App\Http\Livewire\Dashboard\RealEstates;

use Livewire\Component;
use App\Models\RealEstate;

class Show extends Component
{
    public $realEstate;

    public function mount(RealEstate $realEstate)
    {
        $this->realEstate = $realEstate;
    }

    public function render()
    {
        return view('livewire.dashboard.real-estates.show');
    }
}
