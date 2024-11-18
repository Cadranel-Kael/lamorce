<div>
    <div class="top-0 left-0 w-full h-full bg-black opacity-10 absolute"></div>
    <div class="fixed overflow-hidden bg-white top-0 right-0 z-10 min-h-full p-8">
        <div class="flex items-center">
            <div class="flex-grow font-bold text-4xl">New transaction</div>
            <a href="">close</a>
        </div>
        <div class="flex-col flex">
            <x-input placeholder="General donation" label="Name" name="name" required/>
            <x-input-money model="amount" placeholder="0.00" label="Amount" name="amount" required/>
            <x-textarea placeholder="Description" label="Description" name="description"/>

            <div class="bg-gray-100 p-4 rounded mb-8 shadow">
                <button class="p-4 rounded bg-white">Internal</button>
                <button class="p-4 rounded">External</button>
            </div>
            <div class="bg-white rounded p-5 shadow">
                <div class="flex justify-between">
                    <div
                        class="flex bg-gray-100 gap-8 py-1 px-2 rounded items-center">
                        <div class="text-gray-400">From</div>
                        <div class="flex flex-col">
                            <select wire:model.live="from"
                                    class="border-none bg-transparent cursor-pointer hover:bg-white rounded">
                                <option value="">{{ __('Select an account') }}</option>
                                @foreach($collections as $collection)
                                    <option value="{{ $collection->id }}">{{ $collection->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div
                        class="flex bg-gray-100 gap-8 py-1 px-2 rounded items-center">
                        <div class="text-gray-400">To</div>
                        <div class="flex flex-col">
                            <select wire:model.live="to"
                                    class="border-none bg-transparent cursor-pointer hover:bg-white rounded">
                                <option value="">{{ __('Select an account') }}</option>
                                @foreach($collections as $collection)
                                    <option value="{{ $collection->id }}">{{ $collection->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2">
                    @if($from)
                        <div class="bg-gray-100 p-2 inline-block">
                            <div class="font-bold">{{ $fromCollection->name }}</div>
                            <div class="flex flex-col items-end gap-1">
                                <div>{{ $fromCollection->amount }} €</div>
                                <div>- {{ $amount ?? '0.00' }} €</div>
                                <div class="border-t-2 border-black text-lg">{{ $fromCollection->amount - $amount}}€
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($to)
                        <div class="bg-gray-100 p-2 inline-block">
                            <div class="font-bold">{{ $toCollection->name }}</div>
                            <div class="flex flex-col items-end gap-1">
                                <div>{{ $toCollection->amount }} €</div>
                                <div>+{{ $amount ?? '0.00' }} €</div>
                                <div class="border-t-2 border-black text-lg">{{ $toCollection->amount + $amount}}€
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
