<?php

namespace App\Http\Livewire\Dashboard\Notifications;

use App\Models\Captain;
use Livewire\Component;
use App\Models\Passenger;
use App\Http\Traits\Notification as NotificationTrait;
use App\Models\GeneralNotification;
use App\Models\NotificationFireBase;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Form extends Component
{
    use NotificationTrait;
    use AuthorizesRequests;

    public $title, $content, $icon;

    public $search;
    public $is_show = 1;
   // public $type = 'passengers';
    public $user_ids;


    protected $rules = [
        'title' => 'required',
        'content' => 'required|min:3|max:1000',
        //   'icon' => 'nullable',
        //'type' => 'required',
        'user_ids' => 'nullable',

    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    } 
   
    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.dashboard.notifications.form', [
            'generalNotifications' => GeneralNotification::select('id', 'title')->get(),
            'passengers' => Passenger::select('remember_token', 'full_name', 'passenger_code')->get(),
        ]);
    }
}
