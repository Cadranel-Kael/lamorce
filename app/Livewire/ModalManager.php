<?php

namespace App\Livewire;

use App\Concerns\HasModal;
use Livewire\Component;

class ModalManager extends Component
{
    use HasModal;

    public function render()
    {
        return view('livewire.modal-manager');
    }
}
