<x-app-layout>
    @slot('title')
        {{ __('Détentes') }}
    @endslot
    @slot('subMenu')
        <li><a href="{{ route('detentes.overview') }}" class="underline hover:underline">{{ __('Overview') }}</a></li>
        <li><a href="{{ route('detentes') }}"
               class="hover:underline">{{ __('Détente meetings') }}</a></li>
    @endslot

    <livewire:upcoming-detente :dateTime="$upcomingDetente" />

    <div>
    </div>

</x-app-layout>
