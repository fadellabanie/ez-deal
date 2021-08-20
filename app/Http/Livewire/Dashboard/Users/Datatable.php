<?php

namespace App\Http\Livewire\Dashboard\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Datatable extends Component
{

    use WithPagination;

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
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirm($id)
    {
        $this->emit('openDeleteModal'); // Open model to using to jquery
        $this->data_id = $id;
    }

    public function destroy()
    {
        $row = User::findOrFail($this->data_id);
        $row->delete();

        $this->emit('closeDeleteModal'); // Close model to using to jquery
    }

    public function render()
    {
        return view('livewire.dashboard.users.datatable', [
            'users' => User::with('city')
                ->search('name', $this->search)
                ->orSearch('mobile', $this->search)
                ->orSearch('email', $this->search)
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate(2),
        ]);
    }
}
