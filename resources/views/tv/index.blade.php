@extends('layouts.main')

@section('content')
    <div class="container px-4 pt-16 mx-auto">
        <div class="popular-tv">
            <h2 class="text-lg font-semibold tracking-wider text-yellow-500 uppercase">Popoular TV</h2>
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
                @foreach ($popularTv as $tvshow)
                    <x-tv-card :tvshow="$tvshow"/>
                @endforeach
            </div>
        </div>
        <!-- End Of PoPular Tv -->

        {{-- Start Of Now Playing Movies --}}
        <div class="py-24 now-playing-movies">
            <h2 class="text-lg font-semibold tracking-wider text-yellow-500 uppercase">Top Rated Shows</h2>
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
                @foreach ($topRatedTv as $tvshow)
                    <x-tv-card :tvshow="$tvshow" />
                @endforeach

            </div>
        </div>
        {{-- End Of Now Playing Movies --}}
    </div>
@endsection
