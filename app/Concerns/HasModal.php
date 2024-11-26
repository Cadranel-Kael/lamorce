<?php

namespace App\Concerns;

trait HasModal
{
    public string $modalComponent = '';
    public array $modalData = [];
    public string $modalTitle = '';
    public bool $modalExpand = false;

    public function openModal(string $component, array $data = [], string $title = '', bool $expand = false): void
    {
        $this->modalTitle = $title;
        $this->modalExpand = $expand;
        $this->modalComponent = $component;
        $this->modalData = $data;
    }

    public function closeModal(): void
    {
        $this->modalComponent = '';
    }
}
