<?php

namespace App\Livewire\Forms;

use App\Models\Transaction;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TransactionForm extends Form
{
    #[Validate(['required', 'date'])]
    public $date_time = '';

    #[Validate(['required', 'integer'])]
    public $amount = '';

    #[Validate(['required', 'integer', 'different:incoming_collection_id'], as: 'outgoing collection')]
    public $outgoing_collection_id = '';

    #[Validate(['required', 'integer', 'different:outgoing_collection_id'], as: 'incoming collection')]
    public $incoming_collection_id = '';

    public function store()
    {
        $this->validate();

        Transaction::create([
            'date_time' => $this->date_time,
            'amount' => $this->amount*100,
            'incoming_collection_id' => $this->incoming_collection_id,
            'outgoing_collection_id' => $this->outgoing_collection_id,
        ]);


        $this->reset();
    }
}
