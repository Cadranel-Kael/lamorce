<?php

namespace App\Livewire;

use App\Livewire\Forms\CollectionForm;
use App\Models\Collection;
use App\Models\CollectionType;
use Livewire\Component;

class CollectionEdit extends Component
{
    public CollectionForm $form;
    public $types;

    public function mount(int $collection_id)
    {
        $collection = Collection::findOrFail($collection_id);
        $this->types = CollectionType::get();
        $this->form->fill($collection);
    }

    public function render()
    {
        return view('livewire.collection-edit');
    }
}
