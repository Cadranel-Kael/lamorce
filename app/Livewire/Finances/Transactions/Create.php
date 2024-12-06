<?php

namespace App\Livewire\Finances\Transactions;

use App\Models\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Create extends Component
{
    public $from = 1;
    public $to = 2;

    public function switchCollections(): void
    {
        list($this->from, $this->to) = [$this->to, $this->from];
    }

    #[Computed]
    public function fromCollection()
    {
        return Collection::find($this->from);
    }

    #[Computed]
    public function toCollection()
    {
        return Collection::find($this->to);
    }

    public function render()
    {
        return view('livewire.finances.transactions.create', [
            'collections' => Collection::get(),
        ]);
    }
}
