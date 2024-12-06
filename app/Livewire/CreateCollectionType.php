<?php

namespace App\Livewire;

use App\Livewire\Forms\CollectionTypeForm;
use Livewire\Component;

class CreateCollectionType extends Component
{
    public CollectionTypeForm $form;

    public function mount()
    {
    }

    public function create()
    {
        $this->form->store();
    }

    public function render()
    {
        return view('livewire.create-collection-type');
    }
}
