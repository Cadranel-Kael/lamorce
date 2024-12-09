<?php

namespace App\Livewire;

use App\Models\Collection;
use Barryvdh\Debugbar\Facades\Debugbar;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class TransactionForm extends Component
{
    public $from = 1;
    public $to = 2;
    public $amount;

    public function switchCollections()
    {
        list($this->from, $this->to) = [$this->to, $this->from];
    }

    #[Computed]
    public function fromCollection() {
        return Collection::find($this->from);
    }

    #[Computed]
    public function toCollection() {
        return Collection::find($this->to);
    }

    public function render()
    {
        return view('livewire.transaction-form', [
            'collections' => Collection::all(),
            'fromCollection' => $this->fromCollection,
            'toCollection' => $this->toCollection,
        ]);
    }
}
