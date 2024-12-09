<?php

namespace App\Concerns;

trait HasDialog
{
    public array $dialogComponents = [];
    public array $dialogData = [];
    public array $dialogTitles = [];
    public array $dialogExpands = [];
    public array $dialogEdits = [];
    public array $dialogTypes = [];

    public function openModal(string $component, array $data = [], string $title = '', bool $expand = false, array $edit = [], string $type = 'drawer'): void
    {
        if (in_array($component, $this->dialogComponents)) {
            return;
        }
        $this->dialogTitles[] = $title;
        $this->dialogExpands[] = $expand;
        $this->dialogComponents[] = $component;
        $this->dialogData[] = $data;
        $this->dialogEdits[] = $edit;
        $this->dialogTypes[] = $type;
    }

    public function closeModal(int $index = null): void
    {
        if(is_null($index)) {
            $index = count($this->dialogComponents) - 1;
        }

        if (isset($this->dialogComponents[$index])) {
            array_splice($this->dialogComponents, $index, 1);
            array_splice($this->dialogData, $index, 1);
            array_splice($this->dialogTitles, $index, 1);
            array_splice($this->dialogEdits, $index, 1);
            array_splice($this->dialogTypes, $index, 1);
            array_splice($this->dialogExpands, $index, 1);
        }
    }

    public function switchComponent(string $component, int $index = null): void
    {
        if(is_null($index)) {
            $index = count($this->dialogComponents) - 1;
        }

        if (isset($this->dialogComponents[$index])) {
            $this->dialogComponents[$index] = $component;
        }
    }
}
