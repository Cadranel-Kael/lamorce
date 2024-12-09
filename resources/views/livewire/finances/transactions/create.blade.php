<form wire:submit="save">
    <x-input required id="amount" :error="$errors->first('form.amount')">
        <x-slot:label>{{ __('Amount') }}</x-slot:label>
        <x-input.monetery wire:model.blur="form.amount" autofocus placeholder="{{ __('0.00') }}"/>
    </x-input>
    @error('amount')
    <div class="text-red-500">{{ $message }}</div>
    @enderror
    <x-input id="message" class="mb-8">
        <x-slot:label>{{ __('Message') }}</x-slot:label>
        <x-input.text-area wire:model="Message" autofocus placeholder="{{ __('Extra information...') }}"/>
    </x-input>
    <div class="bg-gray-100 flex w-fit py-1 px-2 rounded gap-5 shadow mb-2">
        <button wire:click="updateType('internal')" :class="$wire.type === 'internal' ? 'bg-white' : ''" type="button"
                class="p-1 rounded">{{ __('Internal') }}</button>
        <button disabled wire:click="updateType('incoming')" :class="$wire.type === 'incoming' ? 'bg-white' : ''"
                type="button" class="p-1 rounded">{{ __('Incoming') }}</button>
        <button disabled wire:click="updateType('dispense')" :class="$wire.type === 'dispense' ? 'bg-white' : ''"
                type="button" class="p-1 rounded">{{ __('Dispense') }}</button>
    </div>
    <div class="bg-white shadow p-5">
        <div class="flex justify-between mb-9">
            <x-transaction.select id="incoming">
                <x-slot:label>{{ __('From') }}</x-slot:label>
                <x-transaction.select.select wire:model="form.incoming_collection_id">
                    @foreach($collections as $collection)
                        <option
                            @if($form->outgoing_collection_id === $collection->id )
                                disabled
                            @endif
                            wire:key="{{ $collection->id }}"
                            value="{{ $collection->id }}"
                        >
                            {{ $collection->name }}
                        </option>
                    @endforeach
                </x-transaction.select.select>
            </x-transaction.select>
            <button wire:click="switchCollections" class="bg-primary w-fit p-1 rounded-full" type="button"
                    title="{{ __('Switch') }}">
                <x-icon.arrow-path class="w-7 h-7"/>
            </button>
            <x-transaction.select id="incoming">
                <x-slot:label>{{ __('To') }}</x-slot:label>
                <x-transaction.select.select wire:model="form.outgoing_collection_id">
                    @foreach($collections as $collection)
                        <option
                            @if($form->incoming_collection_id === $collection->id )
                                disabled
                            @endif
                            value="{{ $collection->id }}"
                        >
                            {{ $collection->name }}
                        </option>
                    @endforeach
                </x-transaction.select.select>
            </x-transaction.select>
        </div>
        <div class="flex justify-between">
            @if($this->incomingCollection)
                <div class="bg-gray-100 rounded w-fit min-w-32 p-2 flex flex-col items-end">
                    <div class="font-bold self-start mb-5">{{ $this->incomingCollection->name }}</div>
                    <div class="text-right flex flex-col gap-1">
                        <div>{{ $this->incomingCollection->formatedAmount() }}</div>
                        <div>- {{ format_currency(($form->amount ?: 0)*100) }}</div>
                        <div class="border-t border-gray-200 w-full"></div>
                        <div class="font-bold">
                            {{ format_currency($this->incomingCollection->amount() - ($form->amount ?: 0)*100) }}
                        </div>
                    </div>
                </div>
            @endif
            @if($this->outgoingCollection)
                <div class="bg-gray-100 rounded w-fit min-w-32 p-2 flex flex-col items-end">
                    <div class="font-bold self-start mb-5">{{ $this->outgoingCollection()->name }}</div>
                    <div class="text-right flex flex-col gap-1">
                        <div>{{ $this->outgoingCollection->formatedAmount() }}</div>
                        <div>+ {{ format_currency(($form->amount ?: 0)*100) }}</div>
                        <div class="border-t border-gray-200 w-full"></div>
                        <div class="font-bold">
                            {{ format_currency($this->incomingCollection->amount() - ($form->amount ?: 0)*100) }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    @error('form.incoming_collection_id')
    <div class="text-red-500">{{ $message }}</div>
    @enderror
    <div class="flex justify-end w-full">
        <x-button class="mt-2" type="submit">{{ __('Create') }}</x-button>
    </div>
</form>
