@props(['column', 'sortCol', 'sortAsc'])
<button
        type="button"
        class="group w-full h-full gap-1 flex items-center text-left"
        wire:click="sortBy('{{ $column }}')"
>
    {{ $slot }}
    @if($sortCol === $column)
        <div class="text-gray-400">
            @if($sortAsc)
                <x-icon.mini.arrow-up class="size-4"/>
            @else
                <x-icon.mini.arrow-down class="size-4"/>
            @endif
        </div>
    @else
        <div class="text-gray-400 opacity-0 group-hover:opacity-100">
            <x-icon.mini.arrows-up-down class="size-4"/>
        </div>
    @endif
</button>
