@extends('layouts.main')

@section('content')
    {{-- Start of popular actors --}}

    <div class="container px-4 py-16 mx-auto">
        <div class="popular-actors">
            <h2 class="text-lg font-semibold tracking-wider text-yellow-500 uppercase">Popoular Actors</h2>
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">

                @foreach ($popularActors as $actor)
                    <div class="mt-8 actor">
                        <a href="{{ route('actors.show', $actor['id']) }}">
                            <img src="{{ $actor['profile_path'] }}" alt="profile image" class="transition duration-150 ease-in-out hover:opacity-75">
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('actors.show', $actor['id']) }}" class="text-lg hover:text-gray-300 ">{{ $actor['name'] }}</a>
                            <div class="text-sm text-gray-400 truncate">{{ $actor['known_for'] }}</div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <!-- End Of PoPular Actors -->

        <div class="my-8 page-load-status">
            <div class="flex justify-center">
                <div class="my-8 text-4xl infinite-scroll-request spinner">&nbsp;</div>
            </div>
            <p class="infinite-scroll-last">End of content</p>
            <p class="infinite-scroll-error">Error</p>
        </div>

        {{-- <div class="flex justify-between mt-16">
            @if ($previous)
                <a href="/actors/page/{{ $previous }}" class="px-3 py-2 text-white bg-green-800 rounded-lg hover:bg-green-900">Previous</a>
            @endif
            @if ($next)
                <a href="/actors/page/{{ $next }}" class="px-3 py-2 text-white bg-green-800 rounded-lg hover:bg-green-900">Next</a>
            @endif
        </div> --}}
    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>
    <script>
        var elem = document.querySelector('.grid');
        var infScroll = new InfiniteScroll( elem, {
            // options
            path: '/actors/page/@{{#}}',
            append: '.actor',
            status: '.page-load-status',
            // history: false,
        });
    </script>
@endsection
