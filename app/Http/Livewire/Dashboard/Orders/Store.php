<?php

namespace App\Http\Livewire\Dashboard\Orders;

use Carbon\Carbon;
use App\Models\Order;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Store extends Component
{
    use AuthorizesRequests;

    public $realestate_type_id,$contract_type_id,$view_id,$price,$space;
    public $number_building,$age_building,$street_number,$street_width;
    public $video_url,$city_id,$country_id,$neighborhood;
    public $elevator= false;
    public $parking= false;
    public $ac= false;
    public $furniture= false;
    public $note,$lat,$lng,$address,$name,$type,$type_of_owner,$number_card;

    protected $rules = [
        'name' => 'required',
        'type' => 'required',
        'realestate_type_id' => 'required|exists:realestate_types,id',
        'contract_type_id' => 'required|exists:contract_types,id',
        'view_id' => 'required|exists:views,id',
        'price' => 'required|gt:0',
        'space' => 'required|gt:0',
        'city_id' => 'required',
        'country_id' => 'required',
        'number_building' => 'required|gt:0',
        'age_building' => 'required|gt:0',
        'street_width' => 'required|gt:0',
        'street_number' => 'required|gt:0',
        'video_url' => 'nullable',
        'type_of_owner' => 'required',
        'number_card' => 'required',
        'neighborhood' => 'nullable',
        'note' => 'nullable',
        'elevator' => 'required',
        'parking' => 'required',
        'ac' => 'required',
        'furniture' => 'required',
        'lat' =>  ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
        'lng' => ['required', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
        'address' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->authorize('create orders');

        $validatedData = $this->validate();

        $validatedData['user_id'] = 0;
        $validatedData['neighborhood'] =  $validatedData['neighborhood'] ??  $validatedData['address'];
        $validatedData['end_date'] = Carbon::now()->addDays(15);

        Order::create($validatedData);

        $this->reset();

        session()->flash('alert', __('Saved Successfully.'));
        return redirect()->route('admin.orders.index');

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
