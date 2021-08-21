<?php

namespace App\Http\Livewire\Dashboard\Packages;

use App\Models\Attribute;
use App\Models\Package;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Store extends Component
{
    use WithFileUploads;

    public $ar_name, $en_name, $ar_description, $en_description;
    public $color, $price, $days,$attribute_ids, $icon, $status;
  


    protected $rules = [

        'ar_name' => 'required|min:4|max:100',
        'en_name' => 'required|min:4|max:100',
        'ar_description' => 'required|min:4|max:250',
        'en_description' => 'required|min:4|max:250',
        'attribute_ids' => 'required',
        'color' => 'required',
        'price' => 'required|numeric',
        'days' => 'required|numeric',
        'icon' => 'required',
        'status' => 'required',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $validatedData = $this->validate();

        $validatedData['slug'] = Str::slug($validatedData['en_name']);
        $validatedData['icon'] = ($this->icon) ? uploadToPublic('packages', $validatedData['icon']) : "";

         //dd( $validatedData);
        $package = Package::create($validatedData);
        $package->attributes()->sync($validatedData['attribute_ids']);

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
        return view('livewire.dashboard.packages.store', [
            'attributes' => Attribute::get(),
        ]);
    }
}
