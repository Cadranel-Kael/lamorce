<?php

namespace App\Livewire\Contact\Index;

use Livewire\Attributes\Url;

trait Sortable
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
        if ($this->sortCol) {
            $column = match ($this->sortCol) {
                'country' => 'addresses.country',
                default => 'name',
            };
        }

        return $query
            ->orderBy($column, $this->sortAsc ? 'asc' : 'desc');
    }
}
