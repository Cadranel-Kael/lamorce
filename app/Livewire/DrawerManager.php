<?php

namespace App\Livewire;

use App\Concerns\HasDrawer;
use Barryvdh\Debugbar\Facades\Debugbar;
use Livewire\Attributes\On;
use Livewire\Component;

class DrawerManager extends Component
{
    use HasDrawer;

    protected $listeners = ['openModal', 'closeModal'];


    public function render()
    {
        return view('livewire.drawer-manager');
    }
}
