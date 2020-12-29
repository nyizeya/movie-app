@extends('layouts.main')

@section('content')
    <div class="border-b border-gray-800 tv-info">
        <div class="container flex flex-col px-4 py-16 mx-auto md:flex-row">
            <img src="{{ $tvshow['poster_path'] }}" alt="poster" class="w-64 md:w-96">
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">{{ $tvshow['name'] }}</h2>
                <div class="container flex flex-wrap items-center text-sm text-gray-400">
                    <span>
                        <svg class="w-4 h-4 text-yellow-300 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                          </svg>
                    </span>
                    <span class="ml-1">{{ $tvshow['vote_average'] }}%</span>
                    <span class="mx-2">|</span>
                    <span>{{ $tvshow['first_air_date'] }}</span>
                    <span class="mx-2">|</span>
                    <span>
                        {{ $tvshow['genres'] }}
                    </span>
                </div>
                <p class="mt-8 text-gray-300">
                    {{ $tvshow['overview'] }}
                </p>
                <div class="mt-12">
                    <div class="flex mt-4">
                        @foreach ($tvshow['created_by'] as $crew)
                            @if ($loop->index < 2)
                                <div class="mr-8">
                                    <div>{{  $crew['name'] }}</div>
                                    <div class="text-sm text-gray-400">Creator</div>
                                </div>
                            @else
                                @break
                            @endif
                        @endforeach
                    </div>
                </div>


                <div x-data="{ isOpen: false }">
                   {{-- play trailer starts here --}}
                    @if (count($tvshow['videos']['results']) > 0)
                        <div class="mt-12">
                            <button @click="isOpen = true" class="flex inline-flex items-center px-5 py-4 font-semibold text-gray-900 transition ease-in-out bg-yellow-500 rounded hover:bg-yellow-600"  >
                                <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="ml-2">Play Trailer</span>
                            </button>
                        </div>
                    @endif
                    {{-- play trailer ends here --}}

                    {{-- Trailer Modal Starts Here --}}
                        <div class="fixed top-0 left-0 flex items-center w-full h-full overflow-y-auto shadow-lg"       style="background-color: rgba(0, 0, 0, .5);" x-show.transition.opacity="isOpen">
                            <div class="container mx-auto overflow-y-auto rounded-lg lg:px-32">
                                <div class="bg-gray-900 rounded">
                                    <div class="flex justify-end pt-2 pr-4">
                                        <button @click="isOpen = false" class="text-3xl leading-none hover:text-gray-300">&times;</button>
                                    </div>
                                    <div class="px-8 py-8 modal-body">
                                        <div class="relative overflow-hidden responsive-container" style="padding-top: 56.25%">
                                            <iframe class="absolute top-0 left-0 w-full h-full responsive-iframe" src="https://youtube.com/embed/{{ $tvshow['videos']['results'][0]['key'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- Trailer Modal Ends Here --}}

                </div>

            </div>
        </div>
    </div>
    {{-- End Of Tv Info --}}



    {{-- Start Of Tv Cast --}}
    <div class="border-b border-gray-800 tv-cast">
        <div class="container px-4 py-16 mx-auto">
            <div class="text-4xl font-semibold">Cast</div>
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
                @foreach ($tvshow['credits']['cast'] as $cast)
                    @if ($loop->index < 5)
                        <div class="mt-8">
                            <a href="{{ route('actors.show', $cast['id']) }}">
                                <img src="{{ 'https://image.tmdb.org/t/p/w300/' . $cast['profile_path'] }}" alt="actor" class="w-full transition duration-150 ease-in-out hover:opacity-75">
                                <div class="mt-2">
                                    <div class="mt-2">
                                        <a href="{{ route('actors.show', $cast['id']) }}" class="mt-2 text-lg hover:text-gray-300">{{ $cast['name'] }}</a>
                                        <div class="text-sm text-gray-400">{{ $cast['character'] }}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @else
                        @break
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    {{-- End Of Tv Cast --}}



    {{-- Start Of TV Image --}}
    <div class="tv-images" x-data="{ isOpen: false, image: '' }">
        <div class="container px-4 py-16 mx-auto">
            <div class="text-4xl font-semibold">Image</div>
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3">
                @foreach ($tvshow['images']['backdrops'] as $image)
                    @if ($loop->index < 9)
                        <div class="mt-8">
                            <a @click.prevent="
                                isOpen = true
                                image = '{{ 'https://image.tmdb.org/t/p/original/' . $image['file_path'] }}'
                                "
                                href="#">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $image['file_path'] }}" alt="poster" class="w-full transition duration-150 ease-in-out hover:opacity-75">
                            </a>
                        </div>
                    @else
                        @break
                    @endif
                @endforeach
            </div>
            {{-- Image Modal Starts Here --}}
            <div class="fixed top-0 left-0 flex items-center w-full h-full overflow-y-auto shadow-lg" style="background-color: rgba(0, 0, 0, .5);" x-show.transition.opacity="isOpen">
                <div class="container mx-auto overflow-y-auto rounded-lg lg:px-32">
                    <div class="bg-gray-900 rounded">
                        <div class="flex justify-end pt-2 pr-4">
                            <button @click="isOpen = false" @keydown.escape.window="isOpen = false" class="text-3xl leading-none hover:text-gray-300">&times;</button>
                        </div>
                        <div class="px-8 py-8 modal-body">
                            <img :src="image" alt="poster">
                        </div>
                    </div>
                </div>
            </div>
            {{-- Image Modal Ends Here --}}
        </div>
    </div>

    {{-- End Of TV Image --}}
@endsection
