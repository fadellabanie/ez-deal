<?php

namespace App\Http\Livewire\Dashboard\Notifications;

use App\Models\Captain;
use Livewire\Component;
use App\Models\Passenger;
use Livewire\WithPagination;
use App\Models\GeneralNotification;
use App\Models\NotificationFireBase;
use App\Http\Traits\Notification as NotificationTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Datatable extends Component
{
    use WithPagination;
    use AuthorizesRequests;
    use NotificationTrait;

    public $count = 10;   
    public $search;
    public $title;
    public $content;
   // public $type = 'passengers';
    public $user_ids;


    protected $rules = [
        'title' => 'required|min:2|max:150',
        'content' => 'required|min:3|max:1000',
        //   'icon' => 'nullable',
       // 'type' => 'required',
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

    public function sendNotification()
    {
        $this->authorize('send notifications');
        $validatedData = $this->validate();
   
        $validatedData['content'] = json_encode($validatedData['content']);
       
        NotificationFireBase::create($validatedData);

        foreach ($validatedData['user_ids'] as $key => $value) {
            
            $this->send($value, $validatedData['title'], $validatedData['content']);
        }
       
        //$this->send('fj1LbBqsR8O0AEEhB7rqkX:APA91bGun2MVv7MABTFWYmoBMIkY201W-Ry3K6WaNvE2sUxSyP-cM7LQJ-MbOUPfJ41VMxcug8g0Yrq_Hh_DycbIq8BlqAukt_RuCoMMZVClDzfFtl9q2kwixDT04RGNGgELJmhKf5H0', $validatedData['title'], $validatedData['content']);

        $this->resetForm();
        session()->flash('alert', __('Saved Successfully.'));
    }
    public function render()
    {
        $this->authorize('index notifications');
        return view('livewire.dashboard.notifications.datatable', [
            'notifications' => NotificationFireBase::orderBy('id', 'DESC')->paginate($this->count),
            'generalNotifications' => GeneralNotification::get(),
            'captains' =>  Captain::IsActive()->select('device_token', 'full_name','mobile', 'captain_code')->get(),
            'passengers' => Passenger::select('device_token', 'full_name','mobile' ,'passenger_code')->get(),
        ]);
    }
}
