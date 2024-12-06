<?php

namespace App\Livewire\Forms;

use App\Models\Collection;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CollectionForm extends Form
{
    #[Validate(['required', 'string', 'max:255', 'min:3', 'unique:collections,name'])]
    public $name = '';

    #[Validate(['required'])]
    public $type = '';

    #[Validate(['numeric'])]
    public $amount = '';

    #[Validate(['nullable'])]
    public $description = '';

    #[Validate(['boolean'])]
    public $isClosed = '';

    public function store()
    {
        $this->validate();

        Collection::create([
            'name' => $this->name,
            'type_id' => $this->type,
            'amount' => $this->amount ?: 0,
            'description' => $this->description,
            'isClosed' => $this->isClosed ?: false,
        ]);
    }

    public function update(Collection $collection)
    {
        $this->validate();

        $collection->update([
            'name' => $this->name,
            'type_id' => $this->type,
            'amount' => $this->amount ?: 0,
            'description' => $this->description,
            'isClosed' => $this->isClosed ?: false,
        ]);
    }
}
