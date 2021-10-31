<?php

namespace App\Http\Livewire\Dashboard\StaticPages;

use Livewire\Component;
use App\Models\StaticPage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Store extends Component
{
    use AuthorizesRequests;

    public $ar_title, $en_title, $ar_description, $en_description,$type;

    protected $rules = [
        'ar_title' => 'required|min:4|max:100',
        'en_title' => 'required|min:4|max:100',
        'ar_description' => 'required|min:4',
        'en_description' => 'required|min:4',
        'type' => 'required',
       
    ];
    public function dehydrate() {
        $this->emit('initializeCkEditor');
   }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
       // $this->authorize('create static pages');

        $validatedData = $this->validate();
        $staticPage = StaticPage::whereType('before-create')->count();

        if($staticPage == 2){
            session()->flash('alert', __('can not create more then 2 before create type.'));
            return redirect()->route('admin.static-pages.index');
        }
        StaticPage::create($validatedData);
      
        $this->reset();

        session()->flash('alert', __('Saved Successfully.'));

        return redirect()->route('admin.static-pages.index');

    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
   
    public function render()
    {
        return view('livewire.dashboard.static-pages.store');
    }
}
