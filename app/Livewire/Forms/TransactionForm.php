<?php

namespace App\Livewire\Forms;

use App\Models\Transaction;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TransactionForm extends Form
{
    #[Validate(['required'])]
    public $name = '';

    #[Validate(['required', 'date'])]
    public $date_time = '';

    #[Validate(['required', 'integer'])]
    public $amount = '';

    #[Validate(['integer', 'nullable'])]
    public $outgoing_collection_id = '';

    #[Validate(['integer', 'nullable'])]
    public $incoming_collection_id = '';

    public function store()
    {
        $this->validate();

        Transaction::create([
            'name' => $this->name,
            'date_time' => $this->date_time,
            'amount' => $this->amount*100,
            'incoming_collection_id' => $this->incoming_collection_id,
            'outgoing_collection_id' => $this->outgoing_collection_id,
        ]);

        $this->reset();
    }
}
