<div>
    @slot('title')
        {{ $collection->name }}
    @endslot
    <div class="mb-9">
        <div class="font-bold text-5xl">{{ $collection->name }}</div>
        <div>{{ $collection->type->name }}</div>
    </div>
    <livewire:collection-overview class="mb-11" :total="$collection->formatedAmount()" :desc="$collection->description"/>
    <h2 class="mb-7 font-bold text-xl">{{ __('Latest Transactions') }}</h2>
    @foreach($transactions as $transaction)
        <div class="rounded bg-white mb-4 last:mb-0 shadow p-4 justify-center">
            <div class="flex items-center justify-between">
                <h3 class="font-bold text-xl">{{ $transaction->name() }}</h3>
                <div class="@if($transaction->incoming_collection_id === $collection->id) text-error-600 @endif text-2xl">
                    {{ $transaction->incoming_collection_id === $collection->id ? '-' : '+'}} {{ format_currency($transaction->amount) }} €
                </div>
            </div>
            <div class="flex justify-between items-center">
                <div>{{ $transaction->date_time->toFormattedDayDateString() }}</div>
            </div>
            <div class="border-l-2 pl-2 b-gray-100">{{ $transaction->message }}</div>
        </div>
    @endforeach
    <x-button>{{ __('Detailed view') }}</x-button>
</div>
