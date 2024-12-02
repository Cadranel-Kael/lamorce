<?php

namespace App\Livewire\Forms;

use App\Models\CollectionType;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CollectionTypeForm extends Form
{
    #[Validate(['required', 'string', 'max:255', 'min:3', 'unique:collection_types,name'])]
    public $name = '';

    public function store()
    {
        $this->validate();

        return CollectionType::create([
            'name' => $this->name,
        ]);
    }
}
