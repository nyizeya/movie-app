<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie App</title>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles
</head>
<body class="font-sans text-white bg-gray-900">
    <nav class="border-b border-gray-800">
        <div class="container flex flex-col items-center justify-between px-4 py-6 mx-auto md:flex-row">
            <ul class="flex flex-col items-center md:flex-row">
                <li>
                    <a href="{{ route('movies.index') }}">
                        <svg class="inline-block w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
                        </svg>
                        <span class="font-semibold">Movie App</span>
                    </a>
                </li>
                <li class="mt-4 md:ml-16 md:mt-0">
                    <a href="{{ route('movies.index') }}" class="hover:text-gray-300">Movies</a>
                </li>
                <li class="mt-4 md:ml-6 md:mt-0">
                    <a href="{{ route('tv.index') }}" class="hover:text-gray-300">Tv Shows</a>
                </li>
                <li class="mt-4 md:ml-6 md:mt-0">
                    <a href="{{ route('actors.index') }}" class="hover:text-gray-300">Actors</a>
                </li>
            </ul>
            <div class="flex flex-col items-center md:flex-row">
                <livewire:search-dropdown/>
                <div class="mt-4 md:ml-4 md:mt-0">
                    <a href="#">
                        <img src="/img/henry.jpeg" alt="my_profile" class="w-8 h-8 rounded-full">
                    </a>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
    @livewireScripts
    @yield('scripts')
</body>
</html>
