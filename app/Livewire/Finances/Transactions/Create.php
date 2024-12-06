<?php

namespace App\Livewire\Finances\Transactions;

use App\Livewire\Forms\TransactionForm;
use App\Models\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Create extends Component
{
    public TransactionForm $form;
    public TransactionForm $fromForm;
    public TransactionForm $toForm;
    public $from;
    public $to;
    public $fromCollections;
    public $toCollections;
    public $collections;

    public function mount()
    {
        $this->collections = Collection::get();
    }

    public function fromUpdated()
    {

    }

    public function switchCollections(): void
    {
        list($this->from, $this->to) = [$this->to, $this->from];
    }

    public function save()
    {
        $this->form->date_time = now();
        $this->form->validate();
        $this->fromForm = $this->form;
        $this->fromForm->amount = -$this->fromForm->amount;
        $this->fromForm->store();
        $this->toForm = $this->form;
        $this->toForm->store();
    }

    public function render()
    {
        return view('livewire.finances.transactions.create', [
            'collections' => Collection::get(),
        ]);
    }
}
