<?php

namespace App\Http\Livewire\Dashboard\PaymentReports;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PaymentReport;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Datatable extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    protected $paginationTheme = 'bootstrap';
    public $search;
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
   
    public function render()
    {
        return view('livewire.dashboard.payment-reports.datatable',[
            'reports' => PaymentReport::with('user','package')->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->count),
        ]);
    }
}
