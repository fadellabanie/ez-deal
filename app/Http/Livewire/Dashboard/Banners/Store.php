<?php

namespace App\Http\Livewire\Dashboard\Banners;

use App\Models\AppBanner;
use App\Models\City;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Store extends Component
{

    use WithFileUploads;
    use AuthorizesRequests;

    public $ar_name, $en_name;
    public $ar_description, $en_description;
    public $city_id,$type;
    public $end_date, $start_date;
    public $image, $status;
  
    protected $rules = [
        'type' => 'required|in:top,bottom',
        'ar_name' => 'required|min:4|max:100',
        'en_name' => 'required|min:4|max:100',
        'ar_description' => 'required|min:4|max:250',
        'en_description' => 'required|min:4|max:250',
        'city_id' => 'required|exists:cities,id',
        'start_date' => 'required|after:today',
        'end_date' => 'required|after:today',
        'status' => 'sometimes',
        'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->authorize('create banners');

        $validatedData = $this->validate();

        $validatedData['image'] = ($this->image) ? uploadToPublic('banners', $validatedData['image']) : "";
        $validatedData['user_id'] = Auth::id();
        $validatedData['make_by'] = 'admin';
         
        AppBanner::create($validatedData);

        $this->reset();

        session()->flash('alert', __('Saved Successfully.'));
        return redirect()->route('admin.banners.index');

    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.dashboard.banners.store',[
            'cities' => city::get(),
          
        ]);
    }
}
