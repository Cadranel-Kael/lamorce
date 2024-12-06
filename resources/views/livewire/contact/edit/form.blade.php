<form class="flex gap-6 flex-col" wire:submit="save">
    <fieldset>
        <legend class="mb-3">{{ __('Name') }}</legend>
        <div class="flex gap-4">
            <x-input id="first" required :error="$errors->first('form.first_name')">
                <x-slot:label>{{ __('First') }}</x-slot:label>
                <x-input.text wire:model.live="form.first_name" autofocus placeholder="{{ __('John') }}"/>
            </x-input>
            <x-input id="name" required :error="$errors->first('form.last_name')">
                <x-slot:label>{{ __('Last') }}</x-slot:label>
                <x-input.text wire:model.live="form.last_name" placeholder="{{ __('Doe') }}"/>
            </x-input>
        </div>
    </fieldset>
    <x-input id="email" :error="$errors->first('form.email')">
        <x-slot:label>{{ __('Email') }}</x-slot:label>
        <x-input.text wire:model.live="form.email" placeholder="john.doe@example.com"/>
    </x-input>
    <x-input id="phone" :error="$errors->first('form.phone')">
        <x-slot:label>{{ __('Phone') }}</x-slot:label>
        <x-input.text wire:model.live="form.phone" placeholder="+32 493 02 96 46"/>
    </x-input>
    <x-input id="bank" :error="$errors->first('form.bank_account')">
        <x-slot:label>{{ __('Bank account') }}</x-slot:label>
        <x-input.text wire:model.live="form.bank_account" placeholder="BE64 5230 8141 9552"/>
    </x-input>
    <fieldset
        x-data="{hasAddress: $wire.hasAddress}"
    >
        <div class="flex items-center gap-1 mb-2">
            <legend>{{ __('Address') }}</legend>
            <label for="hasAddress" class="sr-only">{{ __('The contact has address') }}</label>
            <input @click="hasAddress = !hasAddress" wire:model="hasAddress" class="rounded" id="hasAddress"
                   type="checkbox">
        </div>
        <div
            x-show="hasAddress"
            class="flex flex-col gap-4"
        >
            <div class="flex gap-4">
                <x-input id="street" required :error="$errors->first('addressForm.street_name')">
                    <x-slot:label>{{ __('Name') }}</x-slot:label>
                    <x-input.text wire:model.live="addressForm.street_name" placeholder="{{ __('Saint-Thomas Street') }}"/>
                </x-input>
                <x-input id="streetNumber" required :error="$errors->first('addressForm.street_number')">
                    <x-slot:label>{{ __('Number') }}</x-slot:label>
                    <x-input.text wire:model.live="addressForm.street_number" placeholder="32"/>
                </x-input>
                <x-input id="floor" :error="$errors->first('addressForm.floor')">
                    <x-slot:label>{{ __('Floor') }}</x-slot:label>
                    <x-input.text wire:model.live="addressForm.floor" placeholder="2"/>
                </x-input>
            </div>
            <div class="flex gap-4">
                <x-input id="code" required :error="$errors->first('addressForm.postal_code')">
                    <x-slot:label>{{ __('Postal code') }}</x-slot:label>
                    <x-input.text wire:model.live="addressForm.postal_code" placeholder="4000"/>
                </x-input>
                <x-input id="city" required :error="$errors->first('addressForm.city')">
                    <x-slot:label>{{ __('City') }}</x-slot:label>
                    <x-input.text wire:model.live="addressForm.city" placeholder="Liège"/>
                </x-input>
            </div>
            <div class="flex gap-4">
                <x-input id="state" required :error="$errors->first('addressForm.state')">
                    <x-slot:label>{{ __('State') }}</x-slot:label>
                    <x-input.text wire:model.live="addressForm.state" placeholder="Liège"/>
                </x-input>
                <div class="w-full">
                    <livewire:country-picker :selected-country="$this->country()"/>
                    @error('addressForm.country_id')
                    <span class="text-error-600">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </fieldset>

    <x-button type="submit">{{ __('Create contact') }}</x-button>
</form>
