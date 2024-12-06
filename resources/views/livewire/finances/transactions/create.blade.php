<form>
    <x-input required id="name">
        <x-slot:label>{{ __('Name') }}</x-slot:label>
        <x-input.text wire:model.live="name" autofocus placeholder="{{ __('General donation') }}"/>
    </x-input>
    <x-input required id="amount">
        <x-slot:label>{{ __('Amount') }}</x-slot:label>
        <x-input.monetery wire:model.live="amount" autofocus placeholder="{{ __('0.00') }}"/>
    </x-input>
    <x-input required id="description">
        <x-slot:label>{{ __('Description') }}</x-slot:label>
        <x-input.text-area wire:model.live="description" autofocus placeholder="{{ __('Extra information...') }}"/>
    </x-input>
    <div class="bg-gray-100 flex w-fit py-1 px-2 rounded gap-5 shadow">
        <button class="p-1 rounded bg-white">Internal</button>
        <button class="p-1 rounded">External</button>
    </div>
    <div class="bg-white shadow p-5">
        <div class="flex justify-between">
            <label class="bg-gray-100 rounded" for="form">
                <span class="text-gray-500">{{ __('From') }}</span>
                <select id="from" class="bg-transparent border-none" wire:model="from">
                    @foreach(\App\Models\Collection::whereNot('id', $to)->get() as $collection)
                        <option value="{{ $collection->id }}">{{ $collection->name }}</option>
                    @endforeach
                </select>
            </label>
            <button wire:click="switchCollections" class="bg-primary p-1 rounded-full" type="button" title="{{ __('Switch') }}">
                <x-icon.arrow-path class="w-7 h-7"/>
            </button>
            <label class="bg-gray-100 rounded" for="form">
                <span class="text-gray-500">{{ __('To') }}</span>
                <select id="from" class="bg-transparent border-none" wire:model="to">
                    @foreach(\App\Models\Collection::whereNot('id', $from)->get() as $collection)
                        <option value="{{ $collection->id }}">{{ $collection->name }}</option>
                    @endforeach
                </select>
            </label>
        </div>
        <div>
        </div>
    </div>
</form>
