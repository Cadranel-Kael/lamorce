<x-app-layout>
    @slot('back') @endslot
    @livewire('finances.collections.show', ['collection' => $collection])
</x-app-layout>
