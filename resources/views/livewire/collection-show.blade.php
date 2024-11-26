<x-app-layout>
    @slot('modal') @endslot
    @slot('back') @endslot
    @slot('title')
        {{ $collection->name }}
    @endslot
    @slot('subTitle')
        {{ ucfirst($collection->type) }}
    @endslot
    @slot('actions')
        <x-button wire:click="click()">{{ __('New transaction') }}</x-button>
        <x-button-black>{{ __('Modify') }}</x-button-black>
    @endslot

    <x-collection-overview class="mb-11" :total="$collection->amount" :desc="$collection->description"/>
    <h2 class="mb-7 font-bold text-xl">{{ __('Latest Transactions') }}</h2>
    <x-button wire:click.prevent="click()">{{ __('Detailed view') }}</x-button>
    @foreach($transactions as $transaction)
        <div class="rounded bg-white mb-4 last:mb-0">
            <div class="flex items-center justify-between">
                <h3 class="font-bold text-xl">{{ $transaction->name }}</h3>
                <div class="text-2xl">{{ number_format($transaction->amount, 2, '.', ' ') }} €</div>
            </div>
            <div class="flex justify-between items-center">
                <div>{{ $transaction->date_time->format('d/m – H:i a') }}</div>
                <div>John Doe</div>
            </div>
        </div>
    @endforeach
    <x-button>{{ __('Detailed view') }}</x-button>
    {{--    <livewire:transaction-form :collections="$collections"/>--}}
</x-app-layout>
