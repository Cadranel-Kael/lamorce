<?php

namespace App\Livewire\Finances\Collections;

use App\Concerns\HasDialog;
use App\Enum\Month;
use App\Models\Collection;
use App\Models\Transaction;
use Barryvdh\Debugbar\Facades\Debugbar;
use Livewire\Component;

class Show extends Component
{
    use HasDialog;

    public $collection;
    public $transactions;
    public $graphLabels;
    public $graphValues;

    public function mount($collection)
    {
        $this->collection = Collection::findOrFail($collection);
        $this->collection->monthlyAmount();
        if ($this->collection->monthlyAmount()) {
            $this->graphLabels = $this->collection->monthlyAmount()->pluck('month')->map(fn($val) => Month::fromNumber($val)->short())->toArray();
            $this->graphValues = $this->collection->monthlyAmount()->pluck('total')->map(fn($val) => $val / 100)->toArray();
        }

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
