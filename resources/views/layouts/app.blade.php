<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-background">
    <livewire:layout.navigation/>
    <div class="flex">
        <nav class="bg-white pt-11 px-7">
            <h2 class="sr-only">{{ __('Side navigation') }}</h2>
            <ul>
                <li class="text-xl font-bold mb-10"><a href="/">l'amorce</a></li>
                <x-link-nav route="finances.overview">
                    Finances
                    @section('link-nav')
                        <li><a href="" wire:navigate>New transaction</a></li>
                        <li><a href="" wire:navigate>New collection</a></li>
                    @endsection
                </x-link-nav>
                <x-link-nav route="detentes.overview">
                    Détentes
                </x-link-nav>
                <li>
                    <a class="font-bold" href="#" wire:navigate>Users</a>
                    <ul>
                        <li><a href="">New collection</a></li>
                    </ul>
                </li>
                <li>
                    <a class="font-bold" href="#" wire:navigate>Draws</a>
                    <ul>
                        <li><a href="">New transfer</a></li>
                        <li><a href="">New collection</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Page Content -->
        <main class="flex-grow py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 relative">
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
@livewireScriptConfig
</body>
</html>
