@extends('layouts.main')

@section('content')
    <div class="border-b border-gray-800 movie-info">
        <div class="container flex flex-col px-4 py-16 mx-auto md:flex-row">
            <div class="flex-none">
                <img src="{{ $actor['profile_path'] }}" alt="poster" class="w-64 md:w-96">
                <ul class="flex items-center mt-4">
                    @if ($social['facebook'])
                        <li>
                            <a href="{{ $social['facebook'] }}" title="Facebook">
                                <img class="block w-8 h-8 hover:opacity-75" src="{{ asset('img/facebook.svg') }}" alt="">
                            </a>
                        </li>
                    @endif

                    @if ($social['instagram'])
                        <li class="ml-6">
                            <a href="{{ $social['instagram'] }}" title="Instagram">
                                <img class="block w-8 h-8 hover:opacity-75" src="{{ asset('img/instagram.svg') }}" alt="">
                            </a>
                        </li>
                    @endif

                    @if ($social['twitter'])
                        <li class="ml-6">
                            <a href="{{ $social['twitter'] }}" title="Twitter">
                                <img class="block w-8 h-8 hover:opacity-75" src="{{ asset('img/twitter.svg') }}" alt="">
                            </a>
                        </li>
                    @endif

                    @if ($actor['homepage'])
                        <li class="ml-6">
                            <a href="{{ $actor['homepage'] }}" title="Website">
                                <img class="block w-8 h-8 hover:opacity-75" src="{{ asset('img/worldwide.svg') }}" alt="">
                            </a>
                        </li>
                    @endif

                </ul>
            </div>

            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">{{ $actor['name'] }}</h2>
                <div class="container flex flex-wrap items-center text-sm text-gray-400">
                    <span>
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z" />
                          </svg>
                    </span>
                    <span class="ml-2">{{ $actor['birthday'] }} ({{ $actor['age'] }} years old) in {{ $actor['place_of_birth'] }}</span>
                </div>
                <p class="mt-8 text-gray-300">
                    {{ $actor['biography'] }}
                </p>
                <h4 class="mt-12 font-semibold">Known For</h4>
                <div class="grid gap-8 grod-cols-1 sm:grid-cols-2 lg:grid-cols-5">
                    @foreach ($knownForMovies as $movie)
                        <div class="mt-4">
                            <a href="{{ $movie['linkToPage'] }}">
                                <img src="{{ $movie['poster_path'] }}" alt="poster" class="transition duration-150 ease-in-out hover:opacity-75">
                            </a>
                            <a href="{{ $movie['linkToPage'] }}" class="block mt-1 text-sm leading-normal text-gray-400 hover:text-white">{{ $movie['title'] }}</a>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>


    {{-- Start Of Credits --}}
    <div class="border-b credits border-gray800">
        <div class="container px-4 py-16 mx-auto">
            <div class="text-4xl font-semibold">Credits</div>
            <ul class="pl-5 mt-8 leading-loose list-disc">
                @foreach ($credits as $credit)
                    <li>{{ $credit['release_year']}} &middot; <strong>{{ $credit['title'] }}</strong> as {{ $credit['character'] }}</li>
                @endforeach

            </ul>
        </div>
    </div>
    {{-- End Of Credits --}}
@endsection
