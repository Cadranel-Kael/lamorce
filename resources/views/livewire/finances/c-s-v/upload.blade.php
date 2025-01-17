<div>
    <x-formStream
        :stages="['Select file', 'Map columns', 'Data import']"
        :currentStage="$stage"
        class="mb-4"
    />
    @if($stage === 1)
        <h2 class="font-bold text-lg">{{ __('Upload of the CSV') }}</h2>
        <div class="text-gray-500 mb-2">
            {{ __('Make sure the file includes the date, amount and account. The file must be less than 5mb.')}}
        </div>
        <label
            @dragover="$el.classList.add('p-4', 'bg-gray-100')"
            @dragleave="$el.classList.remove('p-4', 'bg-gray-100')"
            @drop="$el.classList.remove('p-4', 'bg-gray-100')"
            for="file"
            class="transition-all p-2 w-full block rounded h-40 max-w-lg mx-auto"
        >
            <div
                class="border-dashed flex flex-col items-center gap-2 h-full justify-center rounded border-gray-400 border">
                <input id="file" type="file" wire:model="file" class="sr-only">
                <div wire:loading.remove class="flex flex-col gap-2 items-center">
                    <x-icon.arrow-down-tray class="text-gray-400 size-10"/>
                    <span>Drop a file or <span class="hover:underline cursor-pointer">click to browse</span></span>
                </div>
                <div wire:loading>
                    <span>Uploading...</span>
                </div>
            </div>
        </label>
        @error('file')
        <div class="text-red-600">{{ $message }}</div>
        @enderror
    @elseif($stage === 2)
        <form wire:submit="setHeaders">
            <h2 class="font-bold text-lg">{{ __('Map columns') }}</h2>
            <div class="text-gray-500 mb-2">
                {{ __('Match your file columns to the fields in our system.')}}
            </div>
            <div>
                <x-table>
                    <x-table.head class="sticky top-0">
                        <x-table.h-cell class="sticky">{{ __('Transaction Fields') }}</x-table.h-cell>
                        <x-table.h-cell class="sticky">{{ __('Your file\'s columns') }}</x-table.h-cell>
                        <x-table.h-cell class="sticky w-full">{{ __('Your file\'s data') }}</x-table.h-cell>
                    </x-table.head>
                    <x-table.body>
                        <x-table.row>
                            <x-table.cell>
                                {{ __('Date') }}
                                <span class="text-red-600">*</span>
                            </x-table.cell>
                            <x-table.cell>
                                <x-input id="dateTimeCol" wire:model.live="dateTimeCol">
                                    <x-input.select>
                                        <option value="">{{ __('Select') }}</option>
                                        @foreach($headers as $header)
                                            <option value="{{ $header }}" @if($header === $defaultDateTimeCol) selected @endif>{{ $header }}</option>
                                        @endforeach
                                    </x-input.select>
                                </x-input>
                            </x-table.cell>
                            <x-table.cell>
                                @if($dateTimeCol)
                                    @for($i = 0; $i < 3; $i++)
                                        {{ $records[$i][$dateTimeCol] }};
                                    @endfor
                                @endif
                            </x-table.cell>
                        </x-table.row>
                        <x-table.row>
                            <x-table.cell>
                                {{ __('Amount') }}
                                <span class="text-red-600">*</span>
                            </x-table.cell>
                            <x-table.cell>
                                <x-input id="amountCol" wire:model.live="amountCol">
                                    <x-input.select>
                                        <option value="">{{ __('Select') }}</option>
                                        @foreach($headers as $header)
                                            <option value="{{ $header }}" @if($header === $defaultAmountCol) selected @endif>{{ $header }}</option>
                                        @endforeach
                                    </x-input.select>
                                </x-input>
                            </x-table.cell>
                            <x-table.cell>
                                @if($amountCol)
                                    @for($i = 0; $i < 3; $i++)
                                        {{ $records[$i][$amountCol] }};
                                    @endfor
                                @endif
                            </x-table.cell>
                        </x-table.row>
                        <x-table.row>
                            <x-table.cell>
                                {{ __('Message') }}
                            </x-table.cell>
                            <x-table.cell>
                                <x-input id="messageCol" wire:model.live="messageCol">
                                    <x-input.select>
                                        <option value="">{{ __('Select') }}</option>
                                        @foreach($headers as $header)
                                            <option value="{{ $header }}" @if($header === $defaultMessageCol) selected @endif>{{ $header }}</option>
                                        @endforeach
                                    </x-input.select>
                                </x-input>
                            </x-table.cell>
                            <x-table.cell>
                                @if($messageCol)
                                    @for($i = 0; $i < 3; $i++)
                                        {{ $records[$i][$messageCol] }};
                                    @endfor
                                @endif
                            </x-table.cell>
                        </x-table.row>
                        <x-table.row>
                            <x-table.cell>
                                {{ __('Name') }}
                                <span class="text-red-600">*</span>
                            </x-table.cell>
                            <x-table.cell>
                                <x-input id="nameCol" wire:model.live="nameCol">
                                    <x-input.select>
                                        <option value="">{{ __('Select') }}</option>
                                        @foreach($headers as $header)
                                            <option value="{{ $header }}" @if($header === $defaultNameCol) selected @endif>{{ $header }}</option>
                                        @endforeach
                                    </x-input.select>
                                </x-input>
                            </x-table.cell>
                            <x-table.cell>
                                @if($nameCol)
                                    @for($i = 0; $i < 3; $i++)
                                        {{ $records[$i][$nameCol] }};
                                    @endfor
                                @endif
                            </x-table.cell>
                        </x-table.row>
                        <x-table.row>
                            <x-table.cell>
                                {{ __('Bank account') }}
                            </x-table.cell>
                            <x-table.cell>
                                <x-input id="accountCol" wire:model.live="accountCol">
                                    <x-input.select>
                                        <option value="">{{ __('Select') }}</option>
                                        @foreach($headers as $header)
                                            <option value="{{ $header }}" @if($header === $defaultAccountCol) selected @endif>{{ $header }}</option>
                                        @endforeach
                                    </x-input.select>
                                </x-input>
                            </x-table.cell>
                            <x-table.cell>
                                @if($accountCol)
                                    @for($i = 0; $i < 3; $i++)
                                        {{ $records[$i][$accountCol] }};
                                    @endfor
                                @endif
                            </x-table.cell>
                        </x-table.row>
                    </x-table.body>
                </x-table>
            </div>
            <div class="mt-2 flex justify-end w-full">
                <x-button type="submit">{{ __('Next') }}</x-button>
            </div>
        </form>
    @elseif($stage === 3)
        <h2 class="font-bold text-lg">{{ __('Data import') }}</h2>
        <div class="text-gray-500 mb-2">
            {{ __('Review the data before importing it into the system.')}}
        </div>
        <dl>
            <dd class="text-xl font-bold">{{ count($this->records) }}</dd>
            <dt>{{ __('Number of transaction imported') }}</dt>
        </dl>
        <dl
            x-data="{ count: $wire.entangle('count') }"
        >
            <dd class="text-xl font-bold" x-text="count"></dd>
            <dt>{{ __('Imported') }}</dt>
        </dl>
        <div class="mt-2 flex justify-end w-full">
            <x-button wire:click="import">{{ __('Import') }}</x-button>
        </div>
    @endif
</div>
