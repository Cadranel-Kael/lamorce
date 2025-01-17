<?php

namespace App\Livewire;

use App\Enum\Month;
use App\Models\Collection;
use App\Models\Transaction;
use Livewire\Component;

class Chart extends Component
{
    public $dataset;

    public function mount(array $labels = [], array $values = [])
    {
        $this->dataset = [
            'labels' => $labels,
            'values' => $values,
        ];
    }

    public function render()
    {
        return view('livewire.chart');
    }
}
