<div class="bg-white rounded p-9 shadow {{ $class }}">
    <div class="gap-9 flex flex-col">
        <div>
            <div class="flex gap-4 mb-6">
                <h2 class="flex-grow text-xl font-bold">{{ __('Total') }}</h2>
                <x-button-black
                    wire:click.prevent="$dispatch('openModal', {component: 'finances.c-s-v.upload', type: 'modal', title: '{{ __('Upload a file') }}'})"
                >{{ __('Import from file') }}</x-button-black>
                <x-button
                    wire:click.prevent="$dispatch('openModal', {component: 'finances.transactions.create', title: '{{ __('New transfer') }}'})"
                >
                    {{ __('New transfer') }}
                </x-button>
            </div>
            <div class="text-5xl">{{ $total }} €</div>
        </div>
        @if($collectionsTotal)
            <div class="flex justify-between">
                <div>
                    <h3 class="text-lg font-bold mb-4">{{ __('Base collection') }}</h3>
                    <div class="text-4xl">{{ $total - $collectionsTotal }} €</div>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">{{ __('Amount divided in collections') }}</h3>
                    <div class="text-4xl">{{ $collectionsTotal }} €</div>
                </div>
            </div>
        @endif
        @if($desc)
            <p class="max-w-lg">{{ $desc }}</p>
        @endif
    </div>
</div>
