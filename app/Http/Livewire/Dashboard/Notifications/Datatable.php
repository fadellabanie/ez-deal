<?php

namespace App\Http\Livewire\Dashboard\Notifications;

use App\Models\Captain;
use Livewire\Component;
use App\Models\Passenger;
use Livewire\WithPagination;
use App\Models\GeneralNotification;
use App\Models\NotificationFireBase;
use App\Http\Traits\Notification as NotificationTrait;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Interfaces\Senders\SenderFactory;

class Datatable extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public $count = 10;
    public $search;
    public $title;
    public $content;
    public $user_ids;


    protected $rules = [
        'type' => 'required',
        'title' => 'required_if:type,firebase-notification|min:2|max:150',
        'content' => 'required|min:3|max:1000',
        'user_ids' => 'required',

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

    public function sendNotification()
    {
        $this->authorize('send notifications');
        $validatedData = $this->validate();

        $validatedData['content'] = json_encode($validatedData['content']);

        NotificationFireBase::create($validatedData);
        
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
        $this->authorize('index notifications');
        return view('livewire.dashboard.notifications.datatable', [
            'notifications' => NotificationFireBase::orderBy('id', 'DESC')->paginate($this->count),
            'users' =>  User::IsActive()->select('device_token', 'name', 'mobile')->get(),
        ]);
    }
}
