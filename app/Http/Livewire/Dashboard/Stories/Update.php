<?php

namespace App\Http\Livewire\Dashboard\Stories;

use App\Models\Story;
use App\Models\City;
use App\Models\Country;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Update extends Component
{
    use WithFileUploads;

    public $story;
    public $image;
    public $city_id;
    public $country_id;

    protected $rules = [
        'story.title' => 'required|min:4|max:100',
        'city_id' => 'required|exists:cities,id',
        'country_id' => 'required|exists:countries,id',
        'story.start_date' => 'required|after:today',
        'story.end_date' => 'required|after:today',
        'story.status' => 'sometimes',
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

        $this->story->save();

        if ($this->image) {
            $this->story->update([
                'image' => uploadToPublic('stories', $validatedData['image']),
            ]);
        }

        $this->story->update([
            'user_id'  => Auth::id(),
            'city_id'  => $validatedData['city_id'],
            'country_id'  => $validatedData['country_id'],
        ]);

        session()->flash('alert', __('Update Successfully.'));

        return redirect()->route('admin.stories.index');
    }

    public function mount(Story $story)
    {
        $this->story = $story;
        $this->city_id = $story->city_id;
        $this->country_id = $story->country_id;
    }

    public function render()
    {
        return view('livewire.dashboard.stories.update', [
            'cities' => city::get(),
            'countries' => Country::get(),
        ]);
    }
}
