<?php

namespace App\Http\Livewire\Dashboard\Banners;

use App\Models\City;
use Livewire\Component;
use App\Models\AppBanner;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Update extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;

    public $banner;
    public $image;
    public $city_id;
    public $type;

    protected $rules = [
        'type' => 'required|in:top,bottom',
        'banner.ar_name' => 'required|min:4|max:100',
        'banner.en_name' => 'required|min:4|max:100',
        'banner.ar_description' => 'required|min:4|max:250',
        'banner.en_description' => 'required|min:4|max:250',
        'city_id' => 'required|exists:cities,id',
        'banner.start_date' => 'required|after:yesterday',
        'banner.end_date' => 'required|after:yesterday',
        'banner.status' => 'sometimes',
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
        $this->authorize('edit banners');

        $validatedData = $this->validate();

        $this->banner->save();

        if ($this->image) {
            $this->banner->update([
                'image' => uploadToPublic('banners', $validatedData['image']),
            ]);
        }
        $this->banner->update([
            'user_id'  => Auth::id(),
            'city_id'  => $validatedData['city_id'],
            'type'  => $validatedData['type'],
        ]);
       
        session()->flash('alert', __('Update Successfully.'));

        return redirect()->route('admin.banners.index');
    }

    public function mount(AppBanner $banner)
    {
        $this->banner = $banner;
        $this->city_id = $banner->city_id;
        $this->type = $banner->type;
    }

    public function render()
    {
        return view('livewire.dashboard.banners.update', [
            'cities' => city::get(),
        ]);
    }
}