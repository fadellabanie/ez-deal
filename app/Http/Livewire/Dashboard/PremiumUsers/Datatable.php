<?php

namespace App\Http\Livewire\Dashboard\PremiumUsers;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    public $package_id = 'all';
    public $type = 'all';
    public $city_id  = 'all';
    public $count = 20;
    public $sortBy = 'created_at';
    public $sortDirection = 'DESC';

   
    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }
        return $this->sortBy = $field;
    }
    public function getData()
    {
        return User::with('city','package')
        ->when('city_id', function ($q) {
            if ($this->city_id != 'all') {
                $q->where('city_id', $this->city_id);
            }
        })
        ->when('package_id', function ($q) {
            if ($this->package_id != 'all') {
                $q->where('package_id', $this->package_id);
            }
        })
        ->when('type', function ($q) {
            if ($this->type != 'all') {
                $q->where('type', $this->type);
            }
        })
        ->where('type', '!=', 'admin')
        ->where(function ($q) {
            $q->search('name', $this->search);
            $q->orSearch('mobile', $this->search);
            $q->orSearch('email', $this->search);
        })
        ->select(['id', 'name', 'avatar', 'email', 'mobile', 'type', 'city_id','package_id','subscribe_to','status','suspend', 'created_at'])
        ->orderBy($this->sortBy, $this->sortDirection)
        ->paginate($this->count);
    }
    public function render()
    {
        
        return view('livewire.dashboard.premium-users.datatable',[
            'users' => $this->getData(),
        ]);
    }
}
