<?php

namespace App\Livewire\Projects\Index;

use App\Concerns\TableMassAction;
use App\Concerns\TableSearchable;
use App\Concerns\TableSortable;
use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination, TableSortable, TableSearchable, Deletable, TableMassAction;

    protected $sortableColumns = [
        'status' => 'status',
        'name' => 'name',
    ];

    public function render()
    {
        $query = Project::query();

        $query = $this->applySearch($query);

        $query = $this->applySorting($query);

        $projects = $query->paginate(10);

        $this->itemsOnPage = $projects->map(fn($project) => (string)$project->id)->toArray();

        return view('livewire.projects.index.table', [
            'projects' => $projects,
        ]);
    }
}
