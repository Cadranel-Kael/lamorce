<?php

namespace App\Livewire;

use App\Livewire\Forms\CollectionForm;
use App\Models\CollectionType;
use Livewire\Component;

class CollectionCreate extends Component
{
    public CollectionForm $form;
    public $types;

    public function mount($type = null)
    {
        $this->types = CollectionType::get();
        $this->form->type = $type;
    }

    public function save()
    {
        $this->form->store();
    }

    public function render()
    {
        return view('livewire.collection-create');
    }
}
