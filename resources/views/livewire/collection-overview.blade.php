<div class="bg-white rounded p-9 shadow {{ $class }}">
    <div class="gap-9 flex flex-col">
        <div>
            <div class="flex gap-4 mb-6">
                <h2 class="flex-grow text-xl font-bold">{{ __('Total') }}</h2>
                <x-button-black>{{ __('Import from file') }}</x-button-black>
                <x-button
                    wire:click.prevent="$dispatch('openModal', {component: 'transaction-form', confirm: true})">{{ __('New transfer') }}</x-button>
            </div>
            <div class="text-5xl">{{ format_currency($total) }} €</div>
        </div>
        @if($collectionsTotal)
            <div class="flex justify-between">
                <div>
                    <h3 class="text-lg font-bold mb-4">{{ __('Base collection') }}</h3>
                    <div class="text-4xl">{{ format_currency($total - $collectionsTotal) }} €</div>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">{{ __('Amount divided in collections') }}</h3>
                    <div class="text-4xl">{{ format_currency($collectionsTotal) }} €</div>
                </div>
            </div>
        @endif
        @if($desc)
            <p class="max-w-lg">{{ $desc }}</p>
        @endif
    </div>
</div>
