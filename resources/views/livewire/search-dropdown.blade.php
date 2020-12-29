<div>
    <div class="relative mt-4 md:mt-0" x-data="{ isOpen: true}" @click.away="isOpen = false">
        <input
        wire:model.debounce.500ms="search"
        x-ref="search" @keydown.window="
            if(event.keyCode === 191){
                event.preventDefault();
                $refs.search.focus();
            }
        "
        type="text"
        class="w-64 px-4 py-1 pl-8 text-sm bg-gray-800 rounded-full focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50"
        placeholder="Search (Press '/' to focus)"
        @focus="isOpen = true">
        <div class="absolute top-0 mt-2 ml-2">
            <svg class="w-4 h-4 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
        </div>
        <div wire:loading class="top-0 right-0 mt-4 mr-6 spinner">

        </div>
        @if (strlen($search) >= 2)
            <div class="absolute z-50 w-64 mt-4 text-sm bg-gray-800 rounded" x-show="isOpen" @keydown.escape.window="isOpen = false" @keydown.shift.tab="isOpen = false">
                @if (count($searchResults) > 0)
                    <ul>
                        @foreach ($searchResults as $result)
                            <li class="border-b border-gray-700">
                                <a href="{{ route('movies.show', $result['id']) }}" class="flex items-center block px-3 py-3 transition duration-150 ease-in-out hover:bg-gray-700">
                                    @if ($result['poster_path'])
                                        <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="poster" class="w-8">
                                    @else
                                        <img src="https://via.placeholder.com/150" alt="poster" class="w-8">
                                    @endif
                                    <span class="ml-4">{{ $result['title'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="px-3 py-3">No Results for "{{ $search }}"</div>
                @endif
            </div>
        @endif
    </div>
</div>
