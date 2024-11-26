<div class="bg-white rounded p-9 shadow {{ $class }}">
    <div class="flex gap-4">
        <h2 class="flex-grow text-xl font-bold">{{ __('Total') }}</h2>
        <x-button-black>{{ __('Import from file') }}</x-button-black>
        <x-button wire:click.prevent="$dispatch('openModal', {component: 'transaction-form'})">{{ __('New transfer') }}</x-button>
    </div>
    <div class="text-5xl">{{ format_currency($total) }} €</div>
    @if($collectionsTotal)
        <div class="flex justify-between">
            <div>
                <h3 class="text-lg font-bold">{{ __('Amount available to transfer') }}</h3>
                <div class="text-4xl">{{ format_currency($total - $collectionsTotal) }} €</div>
            </div>
            <div>
                <h3 class="text-lg font-bold">{{ __('Amount divided') }}</h3>
                <div class="text-4xl">{{ format_currency($collectionsTotal) }} €</div>
            </div>
        </div>
    @endif
    @if($desc)
        <p class="max-w-lg">{{ $desc }}</p>
    @endif
</div>
