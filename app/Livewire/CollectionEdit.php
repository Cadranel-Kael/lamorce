<?php

namespace App\Livewire;

use App\Livewire\Forms\CollectionForm;
use App\Models\CollectionType;
use Livewire\Component;

class CollectionEdit extends Component
{
    public CollectionForm $form;
    public $types;

    public function mount($collection)
    {
        $this->types = CollectionType::get();
        $this->form->fill($collection);
    }

    public function render()
    {
        return view('livewire.collection-edit');
    }
}
