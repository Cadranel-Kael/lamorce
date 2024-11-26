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
                    class="flex h-full shadow relative flex-col w-[{{ 50 - $index }}vw] right-0 z-[{{ 20 + $index }}] rounded-tl overflow-y-scroll bg-white ">
                    <div class="flex px-8 py-4 rounded-tl top-0 gap-2 shadow sticky w-full  bg-white">
                        <div class="w-full font-bold">{{ $modalTitle }}</div>
                        @if($modalExpand)
                            <a title="{{ __('Expand the drawer') }}" href="{{ route($modalComponent, $modalData) }}">
                                <svg class="h-full text-gray-400 hover:text-black" title="{{ __('expand') }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15" />
                                </svg>
                            </a>
                        @endif
                        <button wire:click.prevent="closeModal({{ $index }})">
                            <svg class="h-full text-gray-400 hover:text-black" title="{{ __('close') }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="p-8">
                        @livewire($modalComponent, $modalData, key($modalComponent))
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
