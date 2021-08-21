<?php

namespace App\Http\Livewire\Dashboard\Orders;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Store extends Component
{
    public $realestate_type_id,$contract_type_id,$view_id,$price,$space;
    public $number_building,$age_building,$street_number,$street_width;
    public $video_url,$view,$city_id,$country_id;
    public $elevator,$parking,$ac,$furniture;
    public $note,$lat,$lng,$address,$name;

    protected $rules = [
        'realestate_type_id' => 'required|exists:realestate_types,id',
        'contract_type_id' => 'required|exists:contract_types,id',
        'view_id' => 'required|exists:views,id',
        'price' => 'required|gt:0|numeric',
        'space' => 'required|gt:0|numeric',
        'number_building' => 'required|gt:0|numeric',
        'age_building' => 'required|gt:0|numeric',
        'street_width' => 'required|gt:0|numeric',
        'street_number' => 'required|gt:0|numeric',
        'video_url' => 'nullable',
        'view' => 'required',
        'city_id' => 'required|exists:cities,id',
        'country_id' => 'required|exists:countries,id',
        'elevator' => 'required|boolean',
        'parking' => 'required|boolean',
        'ac' => 'required|boolean',
        'furniture' => 'required|boolean',
        'note' => 'nullable',
        'lat' =>  ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
        'lng' => ['required', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
        'address' => 'required',
        'name' => 'required',
    ];

    public function submit()
    {
        $validatedData = $this->validate();
        $validatedData['user_id'] = Auth::id();

        Order::create($validatedData);

        $this->reset();

        session()->flash('alert', __('Saved Successfully.'));
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }


    public function render()
    {
        return view('livewire.dashboard.orders.store');
    }
}
