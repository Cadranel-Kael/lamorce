<?php

namespace App\Concerns;

use Livewire\Attributes\Url;

trait TableSortable
{
    #[Url]
    public $sortCol = 'name';

    #[Url]
    public $sortAsc = true;

    public function sortBy($column)
    {
        if ($this->sortCol === $column) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortCol = $column;
    }

    protected function applySorting($query)
    {
        $column = $this->sortableColumns[$this->sortCol] ?? 'id';

        return $query
            ->orderBy($column, $this->sortAsc ? 'asc' : 'desc');
    }
}
