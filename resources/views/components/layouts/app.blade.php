<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans bg-background text-gray-900 text-sm overflow-y-scroll">
    <header class="flex flex-col sm:flex-row items-center justify-between px-8 pt-8 sm:py-4">
        <a wire:navigate href="/"><img src="{{ asset('img/logo-dark.svg') }}" alt=""></a>
        <div class="flex items-center">
            @if (Route::has('login'))
                <livewire:welcome.navigation />
            @endif
            <a href="#">
                <img class="w-88 h-10 rounded-full" src="https://gravatar.com/avatar/00000000000000000000000000000?d=mp"
                    alt="avatar">
            </a>
        </div>
    </header>

    <main class="container max-w-custom mx-auto">
        <div class="flex flex-col items-center sm:items-stretch sm:flex-row xl:-translate-x-37.5">
            <div class="w-70 hidden lg:block sm:mr-5 sm:mt-16">
                <div class="border border-blue rounded-xl text-center sticky top-8 py-4 px-3 pt-6 bg-white">
                    <h3 class="text-xl font-semibold">Add an idea</h3>
                    <p class="mt-1 font-medium px-4">
                        @auth
                            Let us know what you would like and we'll take a look over!
                        @else
                            Please login to create an idea.
                        @endauth
                    </p>

                    @auth
                        <livewire:ideas.create-idea />
                    @else
                        <div class="flex mt-5 mb-1 px-4 space-x-3">
                            <a wire:navigate href="{{ route('register') }}"
                                class="py-2 flex-1 bg-gray-100 rounded-xl font-semibold border border-gray-200 hover:border-gray-400">
                                Register
                            </a>
                            <a wire:navigate href="{{ route('login') }}"
                                class="py-2 flex-1 bg-blue text-white rounded-xl font-semibold">
                                Login
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
            <div class="w-full px-2 sm:px-0 sm:w-175 mx-auto">
                <nav class="hidden sm:flex items-center justify-between text-xs">
                    <ul
                        class="uppercase font-semibold flex space-x-10 rtl:space-x-reverse pb-3 border-b-4 border-gray-20">
                        <li><a href="" class="pb-3 border-b-4 border-blue">All ideas (87)</a></li>
                        <li><a href=""
                                class="text-gray-400 pb-3 border-b-4 transition ease-in duration-150 hover:border-blue">Considering
                                (6)</a></li>
                        <li><a href=""
                                class="text-gray-400 pb-3 border-b-4 transition ease-in duration-150 hover:border-blue">In
                                Progress (1)</a></li>
                    </ul>
                    <ul class="uppercase font-semibold flex space-x-10 pb-3 border-b-4 border-gray-20">
                        <li>
                            <a href=""
                                class="text-gray-400 pb-3 border-b-4 transition ease-in duration-150 hover:border-blue">implemented
                                (10)
                            </a>
                        </li>
                        <li>
                            <a href=""
                                class="text-gray-400 pb-3 border-b-4 transition ease-in duration-150 hover:border-blue">
                                Closed (55)
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="mt-4 sm:mt-8">
                    {{ $slot }}
                </div>
            </div>
        </div>

    </main>


</body>

</html>
