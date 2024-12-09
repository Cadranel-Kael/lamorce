<?php

namespace App\Livewire\Finances\Transactions;

use App\Livewire\Forms\TransactionForm;
use App\Models\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Create extends Component
{
    public TransactionForm $form;
    public $collections;
    public $type = 'internal';

    public function mount()
    {
        $this->collections = Collection::get();
    }

    public function updateType($value)
    {
        $this->type = $value;
    }

    public function switchCollections(): void
    {
        list($this->form->outgoing_collection_id, $this->form->incoming_collection_id) = [$this->form->incoming_collection_id, $this->form->outgoing_collection_id];
    }

    public function save()
    {
        $this->form->date_time = now();
        $this->form->store();
    }

    #[Computed]
    public function incomingCollection()
    {
        if (!$this->form->incoming_collection_id) {
            return null;
        }
        return Collection::findOrFail($this->form->incoming_collection_id);
    }

    #[Computed]
    public function outgoingCollection()
    {
        if (!$this->form->outgoing_collection_id) {
            return null;
        }
        return Collection::findOrFail($this->form->outgoing_collection_id);
    }

    public function render()
    {
        return view('livewire.finances.transactions.create', [
            'collections' => Collection::get(),
        ]);
    }
}
