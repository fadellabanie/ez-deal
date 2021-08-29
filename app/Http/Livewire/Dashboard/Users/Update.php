<?php

namespace App\Http\Livewire\Dashboard\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $user;
    public $avatar;
    public $type;

    protected $rules = [
        'user.name' => 'required|min:4|max:100',
        'user.type' =>  'required|in:admin,personal,company',
        'user.trading_certification' =>  'required_if:type,company',
        'user.email' =>  'required|unique:users,email',
        'user.mobile' =>  'required|unique:users,mobile',
        'user.whatsapp_mobile' =>  'required|unique:users,whatsapp_mobile',
        'user.password' => 'nullable|min:8|max:15',
        'user.country_code' => 'required',
        'user.city_id' => 'required',
    ];

    public function updatedIcon()
    {
        $this->validate([
            'avatar' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
    }

    public function submit()
    {
       $validatedData = $this->validate();

        $this->user->save();

        if ($this->user) {
            
            $this->package->update([
                'avatar' => uploadToPublic('users',$validatedData['avatar']),
            ]);
        }

        session()->flash('alert', __('Saved Successfully.'));

        return redirect()->route('packages.index');
    }

    public function mount(User $user)
    {
        $this->user = $user;
        $this->type = $user->type;
    }
    public function render()
    {
        return view('livewire.dashboard.users.update');
    }
}
