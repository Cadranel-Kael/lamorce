@props([
    'modalComponent',
    'modalData' => [],
    'modalTitle',
    'modalExpand' => false,
    'index' => 0,
])
<div
    x-ref="drawer"
    x-trap.noscroll.inert="true"
    wire:keydown.esc="closeModal({{ $index }})"

    class="relative z-[{{ 10 + $index }}]"
    aria-labelledby="slide-over-title"
    role="dialog"
    aria-modal="true">
    <div
        wire:click="closeModal({{ $index }})"
        class="inset-0 fixed w-full z-[{{ 10 + $index }}] h-full"
        aria-hidden="true"></div>
    <div class="fixed overflow-hidden z-[{{ 20 + $index }}]">
        <div class="absolute inset-0 overflow-hidden">
            <div class="fixed inset-y-0 right-0 flex max-w-full ml-10">
                <div
                    class="flex h-full shadow flex-col w-[{{ 50 - $index }}vw] right-0 z-[{{ 20 + $index }}] gap-10 rounded-tl overflow-y-scroll bg-white p-8">
                    <div class="flex">
                        <div>{{ $modalTitle }}</div>
                        @if($modalExpand)
                            <a href="{{ route($modalComponent, $modalData) }}">Expand</a>
                        @endif
                        <button wire:click.prevent="closeModal({{ $index }})">close</button>
                    </div>
                    <div>
                        @livewire($modalComponent, $modalData, key($modalComponent))
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
