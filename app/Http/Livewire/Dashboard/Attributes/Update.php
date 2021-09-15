<?php

namespace App\Http\Livewire\Dashboard\Attributes;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Attribute;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Update extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;

    public $attribute;
    public $icon;

    protected $rules = [
        'attribute.ar_name' => 'required|min:4|max:100',
        'attribute.en_name' =>'required|min:4|max:100',
        'attribute.ar_description' => 'required|min:4|max:250',
        'attribute.en_description' =>'required|min:4|max:250',
        'attribute.price' => 'required|numeric',
        'attribute.days' => 'required|numeric',
        'attribute.is_active' => 'required',
        'attribute.icon' => 'nullable'
    ];

    public function updatedIcon()
    {
        $this->validate([
            'icon' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
    }

    public function submit()
    {
        $this->authorize('edit attributes');

       $validatedData = $this->validate();

        $this->attribute->save();

        if ($this->icon) {
            
            $this->package->update([
                'icon' => uploadToPublic('attributes',$validatedData['icon']),
            ]);
        }

        session()->flash('alert', __('Update Successfully.'));

        return redirect()->route('admin.attributes.index');
    }

    public function mount(Attribute $attribute)
    {
        $this->attribute = $attribute;
    }
    public function render()
    {
        return view('livewire.dashboard.attributes.update');
    }
}
