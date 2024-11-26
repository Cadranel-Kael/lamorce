<?php

namespace App\Livewire;

use App\Concerns\HasModal;
use Barryvdh\Debugbar\Facades\Debugbar;
use Livewire\Component;

class DrawerManager extends Component
{
    use HasModal;

    protected $listeners = ['openModal', 'closeModal'];

    public function render()
    {
        return view('livewire.drawer-manager');
    }
}
