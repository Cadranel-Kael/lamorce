@props([
    'component',
    'data' => [],
    'title',
    'index' => 0,
])
<div
    x-ref="modal"
    x-trap.inert.noScroll="true"
    x-data="modal({
        index: {{ $index }}
    })"
    @keydown.window.escape="close()"

    aria-labelledby="slide-over-title"
    role="dialog"
    aria-modal="true"
    class="relative">
    <div
        @click="close()"
        class="inset-0 fixed z-10 bg-black opacity-10"
        aria-hidden="true"></div>
    <div class="fixed overflow-hidden z-20 inset-0 flex pointer-events-none justify-center items-center">
        <div class="bg-white rounded max-w-4xl pointer-events-auto w-full">
            <div class="flex justify-between shadow rounded-t items-center px-8 py-4 bg-white">
                <div class="font-bold">{{ $title }}</div>
                <button type="button" @click="close()" title="{{ __('Close the drawer') }}">
                    <svg class="h-6 w-6 text-gray-400 hover:text-black" title="{{ __('close') }}"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="px-8 py-4">
                @livewire($component, $data, key($component))
            </div>
        </div>
    </div>
</div>
@script
<script>
    Alpine.data('modal', (config) => {
        return {
            open: true,
            index: config.index,

            close() {
                this.open = false;
            },

            init() {
                this.$watch('open', value => {
                    if (!value) {
                        this.$wire.closeModal(this.index);
                    }
                });
            }
        }
    });
</script>
@endscript
