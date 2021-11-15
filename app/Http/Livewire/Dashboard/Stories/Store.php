<?php

namespace App\Http\Livewire\Dashboard\Stories;

use App\Models\City;
use App\Models\Story;
use App\Models\Country;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Store extends Component
{
    use WithFileUploads;

    public $title, $city_id;
    public $end_date, $start_date;
    public $country_id, $image, $status;
  
    protected $rules = [
        'title' => 'required|min:4|max:100',
        'city_id' => 'required|exists:cities,id',
        'country_id' => 'required|exists:countries,id',
        'start_date' => 'required|after:today',
        'end_date' => 'required|after:today',
        'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        'status' => 'sometimes',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $validatedData = $this->validate();

        $validatedData['image'] = ($this->image) ? uploadToPublic('stories', $validatedData['image']) : "";
        $validatedData['user_id'] = Auth::id();
        $validatedData['make_by'] = 'admin';
         
        Story::create($validatedData);

        $this->reset();

        session()->flash('alert', __('Saved Successfully.'));
        return redirect()->route('admin.stories.index');

    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.dashboard.stories.store',[
            'cities' => city::get(),
            'countries' => Country::get(),
        ]);
    }
}
