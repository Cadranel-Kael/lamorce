<?php

namespace App\Livewire\Finances\Collections;

use App\Livewire\Forms\CollectionForm;
use App\Livewire\Forms\CollectionTypeForm;
use App\Models\Collection;
use App\Models\CollectionType;
use Livewire\Component;

class Edit extends Component
{
    public CollectionForm $form;
    public CollectionTypeForm $typeForm;
    public Collection $collection;
    public $types;

    public function mount($collection_id)
    {
        $this->collection = Collection::findOrFail($collection_id);
        $this->form->fill($this->collection->toArray());
        $this->types = CollectionType::get();
    }

    public function edit()
    {
        $this->form->validate();

        if ($this->form->type === 'new') {
            $type = $this->typeForm->store();
            $this->form->type = $type->id;
        }

        $this->form->update($this->collection);
    }

    public function render()
    {
        return view('livewire.finances.collections.edit');
    }
}
