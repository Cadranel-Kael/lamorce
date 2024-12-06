<div
    x-on:beforeunload.window=""
    x-on:keydown.escape.window=""
>
    <form class="absolute bg-white -left-6 -translate-x-full p-6 rounded">
        <div class="font-bold">Transaction</div>
        <div class="flex flex-col gap-7">
            <div class="flex flex-col gap-4">
                @if($from)
                    <dl class="flex justify-between">
                        <dt class="mr-4">{{ $fromCollection->name }}</dt>
                        <dd>- {{ $amount ?: 0 }} €</dd>
                    </dl>
                @endif
                @if($to)
                    <dl class="flex justify-between">
                        <dt class="mr-4">{{ $toCollection->name }}</dt>
                        <dd>+ {{ $amount ?: 0 }} €</dd>
                    </dl>
                @endif
            </div>
            @if($to && $from)
                <dl class="flex text-2xl justify-between">
                    <dt class="mr-4">Total</dt>
                    <dd>{{ $toCollection->amount + $fromCollection->amount }} €</dd>
                </dl>
            @endif
        </div>
    </form>
    <div>
        <div class="flex items-center">
            <div class="flex-grow font-bold text-4xl">New transaction</div>
        </div>
        <div class="flex-col flex gap-11">
            <div class="flex flex-col gap-5">
                <x-input required id="name">
                    <x-slot:label>{{ __('Name') }}</x-slot:label>
                    <x-input.text wire:model.live="name" autofocus placeholder="{{ __('General donation') }}" />
                </x-input>
                <x-input required id="amount">
                    <x-slot:label>{{ __('Amount') }}</x-slot:label>
                    <x-input.monetery wire:model.live="amount" autofocus placeholder="{{ __('0.00') }}" />
                </x-input>
                <x-input required id="description">
                    <x-slot:label>{{ __('Description') }}</x-slot:label>
                    <x-input.text-area wire:model.live="description" autofocus placeholder="{{ __('Extra information...') }}" />
                </x-input>
            </div>
            <x-transaction-input :collections="$collections" :from-collection="$fromCollection" :amount="$amount" :to-collection="$toCollection" :from="$from" :to="$to" />

        </div>
        <x-button-primary>{{ __('Create new transaction') }}</x-button-primary>
    </div>
</div>
