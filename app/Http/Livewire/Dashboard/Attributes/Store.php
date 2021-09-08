<?php

namespace App\Http\Livewire\Dashboard\Attributes;

use Livewire\Component;
use App\Models\Attribute;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Store extends Component
{

    use WithFileUploads;

    public $ar_name, $en_name, $ar_description, $en_description;
    public $color, $price, $days,$attribute_ids, $icon, $is_active;
  


    protected $rules = [

        'ar_name' => 'required|min:4|max:100',
        'en_name' => 'required|min:4|max:100',
        'ar_description' => 'required|min:4|max:250',
        'en_description' => 'required|min:4|max:250',
        'price' => 'required|numeric',
        'days' => 'required|numeric',
        'icon' => 'required',
        'is_active' => 'required',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $validatedData = $this->validate();

        $validatedData['slug'] = Str::slug($validatedData['en_name']);
        $validatedData['icon'] = ($this->icon) ? uploadToPublic('attributes', $validatedData['icon']) : "";

         //dd( $validatedData);
        Attribute::create($validatedData);

        $this->reset();

        session()->flash('alert', __('Saved Successfully.'));

        return redirect()->route('admin.attributes.index');
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
   
    public function render()
    {
        return view('livewire.dashboard.attributes.store');
    }
}
