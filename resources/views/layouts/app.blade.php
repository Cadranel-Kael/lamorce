<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @livewireStyles

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
@php($currentSection = request()->route()->getName())
<div class="min-h-screen bg-background">
    <div class="flex min-w-screen">
        <nav class="min-h-screen w-fit z-20 fixed h-full bg-white pt-11 px-7 shadow">
            <h2 class="sr-only">{{ __('Side navigation') }}</h2>
            <ul class="flex-col flex gap-4">
                <li class="text-xl font-bold mb-10"><a href="/">l'amorce</a></li>
                <x-link-nav name="finances" route="finances.overview">
                    Finances
                    @slot('linkNav')
                        <li class="hover:font-bold">
                            <button class="text-left"
                                    x-on:click="$dispatch('openModal', {component: 'transaction-form', confirm: true, title: '{{ __('New transfer') }}'})"
                                    wire:navigate>New transaction
                            </button>
                        </li>
                        <li class="hover:font-bold"><a href="" wire:navigate>New collection</a></li>
                    @endslot
                </x-link-nav>
                <x-link-nav route="detentes.overview">
                    Détentes
                </x-link-nav>
                <x-link-nav route="contacts.index">
                    Contacts
                </x-link-nav>
            </ul>
        </nav>
        <div class="w-full">
            @livewire('nav-top')

            <!-- Page Content -->
            <main class="py-12 max-w-7xl ml-72 mx-auto sm:px-6 lg:px-8 relative">
                @livewire('drawer-manager')

                @isset($back)
                    <a href="{{ url()->previous()}}" class="hover:underline">{{ __('Back') }}</a>
                @endisset
                <div class="mb-9 flex items-center">
                    <div class="flex-grow">
                        @isset($title)
                            <div class="font-bold text-5xl">
                                {{ $title }}
                            </div>
                        @endisset
                        @isset($subTitle)
                            <div class="text-gray-500">
                                {{ $subTitle }}
                            </div>
                        @endisset
                    </div>
                    @isset($actions)
                        <div class="gap-4 flex items-start">
                            {{ $actions }}
                        </div>
                    @endisset
                </div>
                @isset($subMenu)
                    <ul class="font-bold flex gap-9 mb-7">
                        {{ $subMenu }}
                    </ul>
                @endisset
                {{ $slot }}
            </main>
        </div>
    </div>
</div>
@livewireScriptConfig
</body>
</html>
