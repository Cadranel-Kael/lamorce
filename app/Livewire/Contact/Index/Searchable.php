<?php

namespace App\Livewire\Contact\Index;

trait Searchable
{
    public $search = '';

    public function updatedSearchable($property)
    {
        if ($property === 'search') {
            $this->resetPage();
        }
    }

    protected function applySearch($query)
    {
        return $this->search === ''
            ? $query
            : $query
                ->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%');
    }
}