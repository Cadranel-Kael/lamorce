<x-app-layout>
    @slot('title')
        Dashboard
    @endslot
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="font-bold text-5xl">{{ __('Finances') }}</div>
        <ul class="font-bold flex gap-9">
            <li><a href="" class="underline hover:underline">{{ __('Overview') }}</a></li>
            <li><a href="" class="hover:underline">{{ __('Collection') }}</a></li>
        </ul>
        <div class="bg-white rounded p-9">
            <div class="flex gap-4">
                <h2 class="flex-grow text-xl font-bold">{{ __('Total') }}</h2>
                <x-button-black>{{ __('Import from file') }}</x-button-black>
                <x-button>{{ __('New transfer') }}</x-button>
            </div>
            <div class="text-5xl">1 534.00 €</div>
            <div class="flex justify-between">
                <div>
                    <h3 class="text-lg font-bold">{{ __('Amount available to transfer') }}</h3>
                    <div class="text-4xl">220.00 €</div>
                </div>
                <div>
                    <h3 class="text-lg font-bold">{{ __('Amount divided') }}</h3>
                    <div class="text-4xl">1 314.00 €</div>
                </div>
            </div>
        </div>
        <div>
            <div class="">
                <h2 class="text-4xl">{{ __('Base collection') }}</h2>
                <x-button-primary>{{ __('New collection') }}</x-button-primary>
            </div>
            <div class="flex gap-6">
                <x-account-card collection="Base collection" status="Active" type="Base" desc="ewfhdsjhfjshfsd"/>
                <x-account-card collection="Utilities"/>
            </div>
            <div class="h-1.5"></div>
            <x-account-list collection="Base collection" status="Active" amount="223.04"/>
        </div>
    </div>
    </div>

</x-app-layout>
