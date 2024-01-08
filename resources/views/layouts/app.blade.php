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
                        Let us know what you would like and we'll take a look over!
                    </p>
                    <form action="POST" class="space-y-4 mt-5">
                        <input placeholder="Your idea"
                            class="bg-gray-100 py-2 px-4 w-full border-none placeholder-gray-900 rounded-xl"
                            type="text">
                        <select class="bg-gray-100 w-full border-none placeholder-gray-900 rounded-xl" name="category">
                            <option value="category one">Category one</option>
                            <option value="category two">Category two</option>
                            <option value="category three">Category three</option>
                            <option value="category four">Category four</option>
                        </select>
                        <textarea class="bg-gray-100 py-2 px-4 w-full placeholder-gray-900 border-none rounded-xl"
                            placeholder="Describe your idea" rows="4" name="idea"></textarea>
                        <div class="flex space-x-3">
                            <button
                                class="py-2 flex-1 flex gap-0.5 justify-center items-center bg-gray-100 rounded-xl font-semibold border border-gray-200 hover:border-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 -rotate-45 text-gray-600"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                </svg>
                                <span>Attach</span>
                            </button>
                            <button class="py-2 flex-1 bg-blue text-white rounded-xl font-semibold">Submit</button>
                        </div>
                    </form>
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
