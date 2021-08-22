<?php

namespace App\Http\Livewire\Dashboard\Packages;

use App\Models\Package;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $package;
    public $icon;

    protected $rules = [
        'package.ar_name' => 'required|min:4|max:100',
        'package.en_name' =>'required|min:4|max:100',
        'package.ar_description' => 'required|min:4|max:250',
        'package.en_description' =>'required|min:4|max:250',
        'package.price' => 'required|numeric',
        'package.color' => 'required',
        'package.days' => 'required|numeric',
        'package.status' => 'required',
        'package.icon' => 'nullable'
    ];

    public function updatedIcon()
    {
        $this->validate([
            'icon' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
    }

    public function submit()
    {
       $validatedData = $this->validate();

        $this->package->save();

        if ($this->icon) {
            
            $this->package->update([
                'icon' => uploadToPublic('packages',$validatedData['icon']),
            ]);
        }

     //   $this->product->tags()->sync($this->productTags);

       // $this->product->timedEvents()->sync($this->productTimedEvents);

        session()->flash('alert', __('Saved Successfully.'));

        return redirect()->route('packages.index');
    }

    public function mount(Package $package)
    {
        $this->package = $package;
    }
    public function render()
    {
        return view('livewire.dashboard.packages.update');
    }
}
