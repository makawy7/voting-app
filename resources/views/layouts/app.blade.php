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

<body class="font-sans bg-background text-gray-900 text-sm">
    <header class="flex items-center justify-between px-8 py-4">
        <a href="#"><img src="{{ asset('img/logo-dark.svg') }}" alt=""></a>
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

    <main class="container max-w-custom mx-auto flex">
        <div class="w-70 mr-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero labore veniam
            similique iure aspernatur consequuntur odit esse, quam quae deleniti dolorum a minima repellat magni? Dicta
            aspernatur, iusto magnam maiores praesentium pariatur eaque saepe cumque cum molestias optio incidunt
            adipisci distinctio numquam, natus corporis ullam veniam laborum? Consectetur quia odio ab quidem reiciendis
            tenetur est iusto, voluptatibus fugit minus temporibus modi dicta expedita fugiat repellat, natus officiis
            vitae velit, ullam voluptas voluptatum perspiciatis corporis! Mollitia porro obcaecati excepturi molestias
            facere rerum quod adipisci optio impedit earum repudiandae dolorem accusantium error atque placeat ex
            assumenda, commodi totam iste quam vitae ea!</div>
        <div class="w-175">
            <nav class="flex items-center justify-between text-xs">
                <ul class="uppercase font-semibold flex space-x-10 pb-3 border-b-4 border-gray-20">
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
            <div class="mt-8">
                {{ $slot }}
            </div>
        </div>
    </main>


</body>

</html>
