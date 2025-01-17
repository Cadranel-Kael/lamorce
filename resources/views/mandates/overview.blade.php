<x-app-layout>
    @slot('title')
        {{ __('Mandates') }}
    @endslot
    @slot('subMenu')
        <li><a href="{{ route('mandates.overview') }}" class="underline hover:underline">{{ __('Overview') }}</a></li>
        <li><a href="{{ route('mandates.overview') }}"
               class="hover:underline">{{ __('Détente meetings') }}</a></li>
    @endslot
    <section class="bg-white rounded p-4 shadow">
        <h2 class="text-4xl mr-6">{{ __('Mandate') }} nº{{ $upcomingMandate->getRowNumber() }}</h2>
        <div>
            <h3>{{ __('Date') }}</h3>
            <p>{{ $upcomingMandate->date_time->format('d/m/y') }}</p>
        </div>
        <div>
            <h3>{{ __('Projects') }}</h3>
            <ul>
                @foreach($upcomingMandate->projects as $project)
                    <li>{{ $project->name }}</li>
                @endforeach
            </ul>
        </div>
        <div>
            <h3>{{ __('Participants') }}</h3>
            @if(count($newContacts) < 3)
                <p class="text-error-600">{{ __('You haven\'t rolled all the new participants yet') }}</p>
                <x-button>{{ __('Roll') }}</x-button>
            @endif
            <ul class="grid grid-cols-3 gap-4">
                @foreach($contacts as $contact)
                    <li class="flex items-center gap-1">
                        <div class="rounded-full bg-success-500 text-white w-8 h-8 flex items-center justify-center">
                            {{ get_initials($contact->name, 2) }}
                        </div>
                        <div class="bg-white shadow rounded p-1">
                            {{ $contact->name }}
                            @if($contact->email !== null)
                                <p>{{ __('Contact doesn\'t have an email') }}</p>
                            @endif
                        </div>
                    </li>
                @endforeach
                @foreach($newContacts as $contact)
                    <li class="flex items-center gap-1">
                        <div class="rounded-full bg-warning-600 text-white w-8 h-8 flex items-center justify-center">
                            {{ get_initials($contact->name, 2) }}
                        </div>
                        {{ $contact->name }}
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
    @livewire('mandate-countdown', ['dateTime' => $upcomingMandate->date_time, 'title' => "Countdown"])
    <section class="bg-white rounded p-4">
        <div class="flex items-center justify-between">
            <h2>{{ __('Projects needing funding') }}</h2>
            <x-button>Go to all projects</x-button>
        </div>
        @livewire('mandates.contact-table')
    </section>

    {{--    @foreach($mandates as $mandate)--}}
    {{--        <article class="bg-white rounded px-6 py-7 w-fit">--}}
    {{--            <h3>Mandate nº{{ $mandate->getRowNumber() }}</h3>--}}
    {{--            {{ $mandate->date_time->format('d/m/y') }}--}}
    {{--            <h4>Projects</h4>--}}
    {{--        </article>--}}
    {{--    @endforeach--}}

    {{--    <livewire:upcoming-detente :dateTime="$upcomingMandates"/>--}}

    <div>
    </div>

</x-app-layout>
