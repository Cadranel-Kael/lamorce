<?php

namespace App\Concerns;

use Barryvdh\Debugbar\Facades\Debugbar;
use function PHPUnit\Framework\isNull;

trait HasModal
{
    public array $modalComponents = [];
    public array $modalData = [];
    public array $modalTitles = [];
    public array $modalExpands = [];

    public function openModal(string $component, array $data = [], string $title = '', bool $expand = false): void
    {
        Debugbar::info('open');
        $this->modalTitles[] = $title;
        $this->modalExpands[] = $expand;
        $this->modalComponents[] = $component;
        $this->modalData[] = $data;
    }

    public function closeModal(int $index = null): void
    {
        Debugbar::info('close');
        if(isNull($index)) {
            $index = count($this->modalComponents) - 1;
        }

        if (isset($this->modalComponents[$index])) {
            array_splice($this->modalComponents, $index, 1);
            array_splice($this->modalData, $index, 1);
            array_splice($this->modalTitles, $index, 1);
            array_splice($this->modalExpands, $index, 1);
        }

    }
}
