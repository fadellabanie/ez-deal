<?php

namespace App\Http\Livewire\Dashboard\Orders;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Update extends Component
{
    use AuthorizesRequests;

    public $order;
    public $images=[];

    protected $rules = [
        'order.name' => 'required',
        'order.type' => 'required',
        'order.realestate_type_id' => 'required|exists:realestate_types,id',
        'order.contract_type_id' => 'required|exists:contract_types,id',
        'order.view_id' => 'required|exists:views,id',
        'order.price' => 'required|gt:0',
        'order.space' => 'required|gt:0',
        'order.city_id' => 'required',
        'order.country_id' => 'required',
        'order.number_building' => 'required|gt:0',
        'order.age_building' => 'required|gt:0',
        'order.street_width' => 'required|gt:0',
        'order.street_number' => 'required|gt:0',
        'order.video_url' => 'nullable',
        'order.type_of_owner' => 'required',
        'order.number_card' => 'required',
        'neighborhood' => 'nullable',
        'note' => 'nullable',
        'order.elevator' => 'required',
        'order.parking' => 'required',
        'order.ac' => 'required',
        'order.furniture' => 'required',
        'order.lat' =>  ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
        'order.lng' => ['required', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
        'order.address' => 'required',
    ];
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->authorize('edit orders');

        $this->validate();

        $this->order->save();

        session()->flash('alert', __('Update Successfully.'));

        return redirect()->route('admin.orders.index');
        
    }

    public function mount(Order $order)
    {
        $this->order = $order;
    }

    public function render()
    {
        return view('livewire.dashboard.orders.update');
    }
}
