<form class="flex flex-col gap-7" wire:submit="save">
    <div class="flex items-center">
        <div class="flex-grow font-bold text-4xl">{{ __('New collection') }}</div>
    </div>
    <div class="flex flex-col gap-5">
        <x-input id="name" required :error="$errors->first('form.name')">
            <x-slot:label>
                {{ __('Name') }}
            </x-slot:label>
            <x-input.text wire:model.blur="form.name" autofocus placeholder="{{ __('My collection') }}" />
        </x-input>
        <div x-data="{show: false}">
            <x-input id="type">
                <x-slot:label>
                    {{ __('Type') }}
                </x-slot>
                <x-input.select @change="if($el.value === 'new') { show = true } else { show = false }" wire:model="form.type">
                    @foreach($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                    <option value="new">{{ __('Create a new type...') }}</option>
                </x-input.select>
            </x-input>
            <div x-show="show" class="bg-white shadow rounded-lg p-4 mt-2">
                <div class="font-bold mb-3">New Type</div>
                <x-input id="typeName" required :error="$errors->first('typeForm.name')">
                    <x-slot:label>
                        {{ __('Name type') }}
                    </x-slot:label>
                    <x-input.text wire:model.blur="typeForm.name" placeholder="{{ __('Collection Type') }}" />
                </x-input>
            </div>
        </div>
        <x-input id="description" :error="$errors->first('form.description')">
            <x-slot:label>
                {{ __('Description') }}
            </x-slot:label>
            <x-input.text-area wire:model.blur="form.description" placeholder="{{ __('Some text here...') }}" />
        </x-input>
    </div>
    <x-button-primary type="submit">{{ __('Create collection') }}</x-button-primary>
</form>
