@props([
    'component',
    'data' => [],
    'title',
    'expand' => false,
    'index' => 0,
    'edit' => '',
])
<div
    x-ref="drawer"
    x-trap.inert="true"
    x-data="drawer"
    x-on:keydown.escape="open = false"
    style="z-index: {{ 10 + $index }}"
    class="relative"
    aria-labelledby="slide-over-title"
    role="dialog"
    aria-modal="true">
    <div
        x-on:click="closeDrawer()"
        style="z-index: {{ 20 + $index }}"
        class="inset-0 fixed w-full h-full"
        aria-hidden="true"></div>
    <div class="fixed overflow-hidden" style="z-index: {{ 20 + $index }}">
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
                    style="width: {{ 50 - $index }}vw; z-index: {{ 30 + $index }}"
                    class="transition-all duration-300 ease-in-out animate-slide-in-left flex h-full shadow relative flex-col right-0 rounded-tl overflow-y-scroll bg-white ">
                    <div class="flex px-8 py-4 rounded-tl top-0 gap-2 shadow sticky w-full  bg-white">
                        <div class="w-full font-bold">{{ $title }}</div>
                        @if($edit)
                            <button
                                @click="$dispatch('openModal', {component: '{{ $edit['component'] }}', title: '{{ $edit['title'] }}' , data: {{ json_encode($edit['data']) }}})"
                                title="{{ __('Edit the entry') }}">
                                <x-icon.pencil class="text-gray-400 h-full hover:text-black"/>
                            </button>
                        @endif
                        @if($expand)
                            <button @click="expanded = !expanded" title="{{ __('Expand to page') }}">
                                <x-icon.arrows-pointing-out class="text-gray-400 h-full hover:text-black"/>
                            </button>
                        @endif
                        <button x-on:click="open = false" title="{{ __('Close dialog') }}">
                            <x-icon.x-mark class="text-gray-400 h-full hover:text-black"/>
                        </button>
                    </div>
                    <div class="p-8">
                        @livewire($component, $data, key($component))
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@script
<script>
    const index = {{ $index }};
    const expand = {{ $expand }};
    if (expand) {
        const href = '{{ route($component, $data) }}';
        console.log(href);
    }

    Alpine.data('drawer', () => {
        return {
            open: true,

            expanded: false,

            closeDrawer() {
                this.open = false;
            },

            init() {
                console.log(index, expand);
                this.$watch('open', value => {
                    if (!value) {
                        setTimeout(() => {
                            this.$wire.closeModal(index);
                        }, 300);
                    }
                });

                this.$watch('expanded', value => {
                    if (value) {
                        setTimeout(() => {
                            this.$wire.closeModal(index);
                            if(expand) {
                                this.window.location.href = href;
                            }
                        }, 300);
                    }
                });
            }
        }
    })
</script>
@endscript
