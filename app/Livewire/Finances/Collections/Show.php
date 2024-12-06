<?php

namespace App\Livewire\Finances\Collections;

use App\Concerns\HasDrawer;
use App\Models\Collection;
use App\Models\Transaction;
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
        $this->transactions =
            Transaction::
            where('incoming_collection_id', $this->collection->id)
            ->orWhere('outgoing_collection_id', $this->collection->id)
            ->orderBy('date_time', 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.finances.collections.show');
    }
}
