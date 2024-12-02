<?php

namespace App\Concerns;


use Barryvdh\Debugbar\Facades\Debugbar;

trait HasDrawer
{
    public array $drawerComponents = [];
    public array $drawerData = [];
    public array $drawerTitles = [];
    public array $drawerExpands = [];
    public bool $confirm;
    public array $drawerEdits = [];

    public function openModal(string $component, array $data = [], string $title = '', bool $expand = false, array $edit = [], bool $confirm = true): void
    {
        if (in_array($component, $this->drawerComponents)) {
            return;
        }
        $this->drawerTitles[] = $title;
        $this->drawerExpands[] = $expand;
        $this->drawerComponents[] = $component;
        $this->drawerData[] = $data;
        $this->confirm = $confirm;
        $this->drawerEdits[] = $edit;
    }

    public function closeModal(int $index = null): void
    {
        if(is_null($index)) {
            $index = count($this->drawerComponents) - 1;
        }

        if (isset($this->drawerComponents[$index])) {
            array_splice($this->drawerComponents, $index, 1);
            array_splice($this->drawerData, $index, 1);
            array_splice($this->drawerTitles, $index, 1);
            array_splice($this->drawerExpands, $index, 1);
        }
    }
}
