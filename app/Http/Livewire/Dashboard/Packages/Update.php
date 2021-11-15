<?php

namespace App\Http\Livewire\Dashboard\Packages;

use App\Models\Package;
use App\Models\Attribute;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Update extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;

    public $package;
    public $icon;
    public $attribute_ids;

    protected $rules = [
        'package.ar_name' => 'required|min:4|max:100',
        'package.en_name' =>'required|min:4|max:100',
        'package.ar_description' => 'required|min:4|max:250',
        'package.en_description' =>'required|min:4|max:250',
        'attribute_ids' => 'required',
        'package.price' => 'required|numeric',
        'package.color' => 'required',
        'package.days' => 'required|numeric',
        'package.status' => 'sometimes',
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
        $this->authorize('edit packages');

       $validatedData = $this->validate();

        $this->package->save();

        if ($this->icon) {
            
            $this->package->update([
                'icon' => uploadToPublic('packages',$validatedData['icon']),
            ]);
        }

        $this->package->attributes()->sync($validatedData['attribute_ids']);


        session()->flash('alert', __('Update Successfully.'));

        return redirect()->route('admin.packages.index');

    }

    public function mount(Package $package)
    {
        $this->package = $package;
        $this->attribute_ids =  $package->attributes()->pluck('id')->all();
        
    }
    public function render()
    {
        return view('livewire.dashboard.packages.update', [
            'attributes' => Attribute::get(),
        ]);
    }
}
