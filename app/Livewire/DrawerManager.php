<?php

namespace App\Livewire;

use App\Concerns\HasDialog;
use Barryvdh\Debugbar\Facades\Debugbar;
use Livewire\Attributes\On;
use Livewire\Component;

class DrawerManager extends Component
{
    use HasDialog;

    protected $listeners = ['openModal', 'closeModal'];


    public function render()
    {
        return view('livewire.dialog-manager');
    }
}
