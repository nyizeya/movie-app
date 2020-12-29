@extends('layouts.main')

@section('content')
    <div class="container px-4 pt-16 mx-auto">
        <div class="popular-movies">
            <h2 class="text-lg font-semibold tracking-wider text-yellow-500 uppercase">Popoular Movies</h2>
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
                @foreach ($popularMovies as $movie)
                    <x-movie-card :movie="$movie" :genres="$genres"/>
                @endforeach

            </div>
        </div>
        <!-- End Of PoPular Movies -->

        {{-- Start Of Now Playing Movies --}}
        <div class="py-24 now-playing-movies">
            <h2 class="text-lg font-semibold tracking-wider text-yellow-500 uppercase">Now Playing Movies</h2>
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
                @foreach ($nowPlayingMovies as $movie)
                    <x-movie-card :movie="$movie" />
                @endforeach

            </div>
        </div>
        {{-- End Of Now Playing Movies --}}
    </div>
@endsection
