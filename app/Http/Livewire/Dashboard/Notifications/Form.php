<?php

namespace App\Http\Livewire\Dashboard\Notifications;

use App\Models\User;
use App\Models\Captain;
use Livewire\Component;
use App\Models\Passenger;
use App\Models\GeneralNotification;
use App\Models\NotificationFireBase;
use App\Http\Interfaces\Senders\SenderFactory;
use App\Http\Traits\Notification as NotificationTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Form extends Component
{
    use NotificationTrait;
    use AuthorizesRequests;

    public $type = 'sms';
    public $title;
    public $content;
    public $users;


    protected $rules = [
        'type' => 'required',
        'title' => 'required_if:type,firebase-notification|min:2|max:150',
        'content' => 'required|min:3|max:1000',
        'users' => 'required',

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

    public function submit()
    {
        //$this->authorize('send notifications');
        $validatedData = $this->validate();
        dd($validatedData);
        $validatedData['content'] = json_encode($validatedData['content']);

        //NotificationFireBase::create($validatedData);
        
        $senderFactory = new SenderFactory();

        if($validatedData['type'] == 'sms'){

            $senderFactory->initialize('sms', $mobile,$validatedData['content']);

        }elseif($validatedData['type'] == 'firebase-notification'){

            $senderFactory->initialize('firebase-notification', $mobile, $validatedData['content'],$validatedData['title']);
        }

        foreach ($validatedData['user_ids'] as $value) {

            $this->send($value, $validatedData['title'], $validatedData['content']);
        }
        $this->resetForm();
        session()->flash('alert', __('Sending Successfully.'));
    }

    public function render()
    {
        return view('livewire.dashboard.notifications.form', [
            'members' =>  User::select('device_token', 'name', 'mobile')->get(),
        ]);
    }
}
