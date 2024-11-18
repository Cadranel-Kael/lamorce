<?php

namespace App\Livewire;

use App\Models\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class TransactionForm extends Component
{
    public $from;
    public $to;
    public $amount;

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
