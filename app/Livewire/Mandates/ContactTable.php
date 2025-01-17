<?php

namespace App\Livewire\Mandates;

use App\Concerns\TableMassAction;
use App\Concerns\TableSearchable;
use App\Concerns\TableSortable;
use App\Livewire\Projects\Index\Deletable;
use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ContactTable extends Component
{
    use WithPagination, TableSortable, TableSearchable;

    protected $sortableColumns = [
        'status' => 'status',
        'name' => 'name',
    ];

    public function render()
    {
        $query = Project::where('status', '=', 'Pending')->orWhere('status', '=', 'Postponed');

        $query = $this->applySearch($query);

        $query = $this->applySorting($query);

        $projects = $query->paginate(10);

        return view('livewire.mandates.contact-table', [
            'projects' => $projects
        ]);
    }
}
