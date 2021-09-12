<?php

namespace App\Http\Livewire\Dashboard\AppSettings;

use Livewire\Component;
use App\Models\AppSetting;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $appSetting;


    protected $rules = [
        'appSetting.facebook' => 'required',
        'appSetting.twitter' => 'required',
        'appSetting.instagram' => 'required',
        'appSetting.snapchat' => 'required',
        'appSetting.whats_app' => 'required',
        'appSetting.email' => 'required',
    ];


    public function submit()
    {
        $this->validate();

        $this->appSetting->save();

        session()->flash('alert', __('Update Successfully.'));
    }

    public function mount(AppSetting $appSetting)
    {
        $this->appSetting = $appSetting;
    }

    public function render()
    {
        return view('livewire.dashboard.app-settings.update');
    }
}
