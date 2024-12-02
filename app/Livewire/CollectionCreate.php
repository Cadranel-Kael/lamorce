<?php

namespace App\Livewire;

use App\Livewire\Forms\CollectionForm;
use App\Livewire\Forms\CollectionTypeForm;
use App\Models\CollectionType;
use Livewire\Component;

class CollectionCreate extends Component
{
    public CollectionForm $form;
    public CollectionTypeForm $typeForm;
    public $types;

    public function mount($type = null)
    {
        $this->types = CollectionType::get();
        $this->form->type = $type;
    }

    public function save()
    {
        $this->form->validate();

        if ($this->form->type === 'new') {
            $type = $this->typeForm->store();
            $this->form->type = $type->id;
        }

        $this->form->store();
    }

    public function render()
    {
        return view('livewire.collection-create');
    }
}
