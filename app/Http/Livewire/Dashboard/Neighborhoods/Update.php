<?php

namespace App\Http\Livewire\Dashboard\Neighborhoods;

use Livewire\Component;
use App\Models\Neighborhood;
use Livewire\WithFileUploads;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Update extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;

    public $neighborhood;

    protected $rules = [
        'neighborhood.ar_name' => 'required|min:4|max:100',
        'neighborhood.en_name' => 'required|min:4|max:100',
        'neighborhood.status' => 'sometimes',
    ];

    public function submit()
    {
        $this->authorize('edit neighborhoods');

       $this->validate();

        $this->neighborhood->save();

        session()->flash('alert', __('Update Successfully.'));

        return redirect()->route('admin.neighborhoods.index');
    }

    public function mount(Neighborhood $neighborhood)
    {
        $this->neighborhood = $neighborhood;
    }
    public function render()
    {
        return view('livewire.dashboard.neighborhoods.update');
    }
}
