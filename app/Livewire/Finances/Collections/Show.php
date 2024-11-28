<?php

namespace App\Livewire\Finances\Collections;

use App\Concerns\HasDrawer;
use App\Models\Collection;
use Barryvdh\Debugbar\Facades\Debugbar;
use Livewire\Component;

class Show extends Component
{
    use HasDrawer;

    public $collection;
    public $transactions;

    public function click()
    {
        Debugbar::error('Clicked');
    }

    public function mount($collection)
    {
        $this->collection = Collection::findOrFail($collection);
        $this->transactions = $this->collection->transactions()->limit(3)->get();
    }

    public function render()
    {
        return view('livewire.finances.collections.show');
    }
}
