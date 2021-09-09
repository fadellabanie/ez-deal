<?php

namespace App\Http\Livewire\Dashboard\Banners;

use App\Models\AppBanner;
use App\Models\City;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Update extends Component
{

    use WithFileUploads;

    public $banner;
    public $image;

    protected $rules = [
        'banner.ar_name' => 'required|min:4|max:100',
        'banner.en_name' => 'required|min:4|max:100',
        'banner.ar_description' => 'required|min:4|max:250',
        'banner.en_description' => 'required|min:4|max:250',
        'banner.city_id' => 'required|exists:cities,id',
        'banner.start_date' => 'required|after:today',
        'banner.end_date' => 'required|after:today',
        'banner.status' => 'required',
        'image' => 'nullable',
    ];

    public function updatedIcon()
    {
        $this->validate([
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
    }

    public function submit()
    {
        $validatedData = $this->validate();

        $this->banner->save();

        if ($this->image) {
            $this->banner->update([
                'image' => uploadToPublic('banners', $validatedData['image']),
            ]);
        }

        $this->banner->update([
            'user_id'  => Auth::id(),
        ]);

        session()->flash('alert', __('Saved Successfully.'));

        return redirect()->route('admin.banners.index');
    }

    public function mount(AppBanner $banner)
    {
        $this->banner = $banner;
    }

    public function render()
    {
        return view('livewire.dashboard.banners.update', [
            'cities' => city::get(),
        ]);
    }
}