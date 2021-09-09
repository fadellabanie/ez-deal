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

    protected $rules = [
        'story.title' => 'required|min:4|max:100',
        'story.city_id' => 'required|exists:cities,id',
        'story.country_id' => 'required|exists:countries,id',
        'story.start_date' => 'required|after:today',
        'story.end_date' => 'required|after:today',
        'story.status' => 'required',
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
        ]);

        session()->flash('alert', __('Saved Successfully.'));

        return redirect()->route('admin.stories.index');
    }

    public function mount(Story $story)
    {
        $this->story = $story;
    }

    public function render()
    {
        return view('livewire.dashboard.stories.update', [
            'cities' => city::get(),
            'countries' => Country::get(),
        ]);
    }
}
