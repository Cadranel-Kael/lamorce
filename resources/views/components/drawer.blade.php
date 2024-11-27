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
    x-data="{ open: true, expanded: false }"
    x-init="
        $watch('open',
            value => { if (!value) {
                    setTimeout(() => {
                        $wire.closeModal({{ $index }})
                    }, 300);
                }
            })
        $watch('expanded',
            value => { if (value) {
                    setTimeout(() => {
                        $wire.closeModal({{ $index }});
                        @if($modalExpand)
                        window.location.href = '{{ route($modalComponent, $modalData) }}';
                        @endif
                    }, 300);
                }
            })"
    x-on:keydown.escape.window="open = false"

    class="relative z-[{{ 10 + $index }}]"
    aria-labelledby="slide-over-title"
    role="dialog"
    aria-modal="true">
    <div
        x-on:click="open = false"
        class="inset-0 fixed w-full z-[{{ 10 + $index }}] h-full"
        aria-hidden="true"></div>
    <div class="fixed overflow-hidden z-[{{ 20 + $index }}]">
        <div class="absolute inset-0 overflow-hidden">
            <div class="fixed inset-y-0 right-0 flex max-w-full ml-10">
                <div
                    x-show="open"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="transform translate-x-0"
                    x-transition:leave-end="transform translate-x-full"
                    :style="{
                        translate: open ? '0' : '100%',
                        transform: expanded ? 'scale(2)' : 'scale(1)',
                        opacity: expanded ? 0 : 1
                    }"
                    style="width: {{ 50 - $index }}vw"
                    class="transition-all duration-300 ease-in-out animate-slide-in-left flex h-full shadow relative flex-col right-0 z-[{{ 20 + $index }}] rounded-tl overflow-y-scroll bg-white ">
                    <div class="flex px-8 py-4 rounded-tl top-0 gap-2 shadow sticky w-full  bg-white">
                        <div class="w-full font-bold">{{ $modalTitle }}</div>
                        @if($modalExpand)
                            <button @click="expanded = !expanded" title="{{ __('Expand the drawer') }}"
                               href="{{ route($modalComponent, $modalData) }}">
                                <svg class="h-full text-gray-400 hover:text-black" title="{{ __('expand') }}"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15"/>
                                </svg>
                            </button>
                        @endif
                        <button x-on:click="open = false">
                            <svg class="h-full text-gray-400 hover:text-black" title="{{ __('close') }}"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
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
