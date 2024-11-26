<?php

namespace App\Livewire;

use Livewire\Component;

class CollectionOverview extends Component
{
    public $total = 0.00;
    public $collectionsTotal = 0.00;
    public $desc = '';
    public $class = '';

    public function render()
    {
        return view('livewire.collection-overview');
    }
}
