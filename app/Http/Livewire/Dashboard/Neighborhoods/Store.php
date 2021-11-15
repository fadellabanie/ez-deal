<?php

namespace App\Http\Livewire\Dashboard\Neighborhoods;

use Livewire\Component;
use App\Models\Neighborhood;
use Livewire\WithFileUploads;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Store extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;

    public $ar_name, $en_name,$status;
  
    protected $rules = [
        'ar_name' => 'required|min:4|max:100',
        'en_name' => 'required|min:4|max:100',
        'status' => 'sometimes',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->authorize('create neighborhoods');

        $validatedData = $this->validate();
         
        Neighborhood::create($validatedData);

        $this->reset();

        session()->flash('alert', __('Saved Successfully.'));

        return redirect()->route('admin.neighborhoods.index');

    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    public function render()
    {
        return view('livewire.dashboard.neighborhoods.store');
    }
}
