<div>
    <div class="absolute bg-white -left-6 -translate-x-full p-6 rounded">
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
    </div>
    <div>
        <div class="flex items-center">
            <div class="flex-grow font-bold text-4xl">New transaction</div>
        </div>
        <div class="flex-col flex gap-11">
            <div class="flex flex-col gap-5">
                <x-input autofocus placeholder="General donation" label="Name" name="name" required/>
                <x-input-money model="amount" placeholder="0.00" label="Amount" name="amount" required/>
                <x-textarea placeholder="Description" label="Description" name="description"/>
            </div>
            <div x-data="{
                type: 'internal',
                switchToExternal() {
                    this.type = 'external'
                },
                switchToInternal() {
                    this.type = 'internal'
                },
                toggle() {
                    this.type = this.type === 'internal' ? 'external' : 'internal'
                }
             }">
                <div class="bg-gray-100 p-4 rounded mb-8 shadow w-fit">
                    <button @click.prevent="switchToInternal" class="p-4 rounded" :class="type === 'internal' ? 'bg-white' : ''">Internal</button>
                    <button @click.prevent="switchToExternal" class="p-4 rounded" :class="type === 'external' ? 'bg-white' : ''">External</button>
                </div>
                <div class="bg-white rounded p-5 shadow">
                    <div class="flex justify-between gap-4">
                        <div class="flex bg-gray-100 gap-8 py-1 px-2 rounded items-center">
                            <div class="text-gray-400">From</div>
                            <div class="flex flex-col">
                                <select wire:model.live="from"
                                        class="border-none bg-transparent cursor-pointer hover:bg-white rounded">
                                    <option value="">{{ __('Select an account') }}</option>
                                    @foreach($collections as $collection)
                                        <option
                                            value="{{ $collection->id }}">{{ $collection->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button wire:click="switchCollections">Switch</button>
                        <div
                            class="flex bg-gray-100 gap-8 py-1 px-2 rounded items-center">
                            <div class="text-gray-400">To</div>
                            <div class="flex flex-col">
                                <select wire:model.live="to"
                                        class="border-none bg-transparent cursor-pointer hover:bg-white rounded">
                                    <option value="">{{ __('Select an account') }}</option>
                                    @foreach($collections as $collection)
                                        <option
                                            value="{{ $collection->id }}">{{ $collection->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between">
                        @if($from)
                            <div class="bg-gray-100 p-2 w-1/3 mt-9 rounded">
                                <div class="font-bold">{{ $fromCollection->name }}</div>
                                <div class="flex flex-col items-end gap-1">
                                    <div>{{ $fromCollection->amount }} €</div>
                                    <div>- {{ $amount ?? '0.00' }} €</div>
                                    <div
                                        class="border-t-2 border-black text-lg">{{ $fromCollection->amount - $amount}}
                                        €
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($to)
                            <div class="bg-gray-100 p-2 w-1/3 mt-9 rounded">
                                <div class="font-bold">{{ $toCollection->name }}</div>
                                <div class="flex flex-col items-end gap-1">
                                    <div>{{ $toCollection->amount }} €</div>
                                    <div>+{{ $amount ?? '0.00' }} €</div>
                                    <div
                                        class="border-t-2 border-black text-lg">{{ $toCollection->amount + $amount}}
                                        €
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <x-button-primary>{{ __('Create new transaction') }}</x-button-primary>
    </div>
</div>
