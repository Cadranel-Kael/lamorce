A@props([
    'modalComponent',
    'modalData' => [],
    'modalTitle',
    'modalExpand' => false
])
<div
        x-ref="drawer"
        x-data="drawer"
        x-trap.noscroll.inert="true"
        @keydown.esc.window="$wire.closeModal"

        class="relative z-10"
        aria-labelledby="slide-over-title"
        role="dialog"
        aria-modal="true">
    <div
            wire:click="closeModal()"
            class="inset-0 fixed w-full z-10 h-full"
            aria-hidden="true"></div>
    <div class="fixed overflow-hidden z-20">
        <div class="absolute inset-0 overflow-hidden">
            <div class="fixed inset-y-0 right-0 flex max-w-full ml-10">
                <div class="flex h-full shadow flex-col w-[50vw] right-0 z-20 gap-10 rounded-tl overflow-y-scroll bg-white p-8">
                    <div class="flex">
                        <div>{{ $modalTitle }}</div>
                        @if($modalExpand)
                            <a href="{{ route($modalComponent, $modalData) }}">Expand</a>
                        @endif
                        <button class="" wire:click.prevent="closeModal()">close</button>
                    </div>
                    @livewire($modalComponent, $modalData)
                </div>
            </div>
        </div>
    </div>
</div>
