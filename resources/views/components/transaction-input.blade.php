<div x-data="typeSwitch">
    <div class="bg-gray-100 p-4 rounded mb-8 shadow w-fit">
        <button @click.prevent="switchToInternal" class="p-4 rounded" :class="isExternal ? '' : 'bg-white'">Internal</button>
        <button @click.prevent="switchToExternal" class="p-4 rounded" :class="isExternal ? 'bg-white' : ''">External</button>
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

@script
<script>
    Alpine.data('typeSwitch', ()=> {
        return {
            isExternal: false,

            switchToExternal() {
                this.isExternal = true;
            },

            switchToInternal() {
                this.isExternal = false
            },

            toggle() {
                this.isExternal = !this.isExternal;
            }
        }
    })
</script>
@endscript
