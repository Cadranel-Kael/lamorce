<form class="flex flex-col gap-7" wire:submit="save">
    <div class="flex items-center">
        <div class="flex-grow font-bold text-4xl">{{ __('New collection') }}</div>
    </div>
    <div class="flex flex-col gap-5">
        <x-input id="name" required>
            <x-slot:label>
                {{ __('Name') }}
            </x-slot:label>
            <x-input.text wire:model="form.name" autofocus placeholder="{{ __('My collection') }}" />
        </x-input>
        <div x-data="{show: false}">
            <x-select label="Type" required>
                <x-select.select x-on:change="if($el.value === 'new') { show = true } else { show = false }" name="type" model="form.type">
                    @foreach($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                    <option value="new">{{ __('Create a new type...') }}</option>
                </x-select.select>
            </x-select>
            <div x-show="show" class="bg-white pl-1 mt-1 ml-1">
                <div class="font-bold mb-3">New Type</div>
                <x-input id="typeName" required>
                    <x-slot:label>
                        {{ __('Name type') }}
                    </x-slot:label>
                    <x-input.text wire:model="typeForm.name" placeholder="{{ __('Collection Type') }}" />
                </x-input>
            </div>
        </div>
        <x-textarea placeholder="Some text here..." label="Description" name="description"/>
    </div>
    <x-button-primary type="submit">{{ __('Create collection') }}</x-button-primary>
</form>
