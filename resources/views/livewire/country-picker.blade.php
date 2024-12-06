<div
    x-data="{ open: false }"
    class="w-full relative"
>
    <label>{{ __('Country') }}<span class="text-error-600">*</span></label>
        <button
            @click="open = !open"
            type="button"
            class="border-gray-400 mt-2 border rounded px-3 py-1 w-full flex items-center gap-1 justify-between">
            @if($selectedCountry)
                <div class="flex justify-start items-center">
                <div class="w-5 h-5">
                    <img src="{{ $selectedCountry->flag_url }}" alt="{{ $selectedCountry->getTranslation('en')->flag_alt }}" width="24"
                         class="rounded-full h-full w-full object-cover">
                </div>
                {{ $selectedCountry->getTranslation('en')->name }}
                </div>
            @else
                {{ __('Select a country') }}
            @endif
            <x-icon.mini-chevron-down class="text-gray-400"/>
        </button>

    <div
        class="absolute bg-white p-1 shadow mt-1 rounded w-full"
        x-show="open"
        x-transition
        @click.outside="open = false"
    >
        <input class="w-full border-0 border-b border-gray-400" type="text" wire:model.live="search"
               placeholder="{{ __('Search...') }}">
        <div class="flex flex-col gap-1">
            @foreach($this->countries() as $country)
                <button
                    @click="open = false"
                    wire:click="$parent.selectCountry('{{ $country['id'] }}')"
                    type="button"
                    class="rounded p-2 flex items-center gap-1 w-full text-left hover:bg-gray-200"
                >
                    <div class="w-5 h-5">
                        <img src="{{ $country['flag_url'] }}" alt="{{ $country['flag_alt'] }}" width="24"
                             class="rounded-full h-full w-full object-cover">
                    </div>
                    {{ $country['name'] }}
                </button>
            @endforeach
        </div>
    </div>
</div>
