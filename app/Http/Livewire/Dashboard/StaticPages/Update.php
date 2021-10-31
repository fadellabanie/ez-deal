<?php

namespace App\Http\Livewire\Dashboard\StaticPages;

use App\Models\StaticPage;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Update extends Component
{
    use AuthorizesRequests;

    public $staticPage;
    public $ar_description;
    public $en_description;

    protected $rules = [
        'staticPage.ar_title' => 'required|min:4|max:100',
        'staticPage.en_title' => 'required|min:4|max:100',
        'ar_description' => 'required|min:4',
        'en_description' => 'required|min:4',
        'staticPage.type' => 'required',
    ];

    public function submit()
    {
        // $this->authorize('edit static pages');

        $this->validate();
        $validatedData = $this->validate();
        $staticPage = StaticPage::whereType('before-create')->count();

        if($staticPage == 2){
            session()->flash('alert', __('can not create more then 2 before create type.'));
            return redirect()->route('admin.static-pages.index');
        }
        $this->staticPage->save();

        $this->staticPage->update([
            'ar_description' =>    $validatedData['ar_description'],
            'en_description' => $validatedData['en_description'],
        ]);

        session()->flash('alert', __('Update Successfully.'));

        return redirect()->route('admin.static-pages.index');
    }

    public function mount(StaticPage $staticPage)
    {
        $this->staticPage = $staticPage;
        $this->ar_description = $staticPage->ar_description;
        $this->en_description = $staticPage->en_description;
    }
    public function render()
    {
        return view('livewire.dashboard.static-pages.update');
    }
}
