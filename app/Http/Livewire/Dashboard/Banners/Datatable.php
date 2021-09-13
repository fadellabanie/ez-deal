<?php

namespace App\Http\Livewire\Dashboard\Banners;

use App\Models\AppBanner;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\BannerExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Datatable extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public $data_id;
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
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirm($id)
    {
        $this->authorize('delete banners');

        $this->emit('openDeleteModal'); // Open model to using to jquery

        $this->data_id = $id;
    }

    public function destroy()
    {
        $row = AppBanner::findOrFail($this->data_id);
        $row->delete();

        $this->emit('closeDeleteModal'); // Close model to using to jquery
    }
    
    public function export()
    {
        $this->authorize('export banners');

        return Excel::download(new BannerExport, 'banners.xlsx');
    }
    public function render()
    {
        return view('livewire.dashboard.banners.datatable', [
            'banners' => AppBanner::with('user','city')->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->count),
        ]);
    }
}