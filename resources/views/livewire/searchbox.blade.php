<div class="relative mt-3 md:mt-0" x-data="{ isOpen : true }">
    <input wire:model="search" type="text" class="bg-gray-800 text-sm rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline" placeholder="Search For Movies"
           @focus=" isOpen=true"
           @keydown.window.escape=" isOpen=false "
           @keydown.shift.tab="isOpen=false"
           @click.away="isOpen=false"
    >
    <div class="absolute top-0">
        <svg class="fill-current w-4 text-gray-500 mt-2 ml-2" viewBox="0 0 24 24"><path class="heroicon-ui" d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z"/></svg>
    </div>
        <div wire:loading class=" absolute top-0 right-0  loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-5 w-5 mb-4"></div>
        <div class="absolute bg-gray-800 text-sm rounded w-64 mt-4"
             x-show="isOpen"


        >
                <ul>
                    @if(count($searchResult) > 0 )

                        @foreach($searchResult as $result)
                            <li class="border-b border-gray-700">
                                <a
                                    @if($loop->last) @keydown.tab="isOpen=false" @endif

                                href="{{ route('movies.show', $result['id']) }}" class="block hover:bg-gray-700 px-3 py-3 flex items-center transition ease-in-out duration-150">
                                    @if ($result['poster_path'])
                                        <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="poster" class="w-8">
                                    @else
                                        <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                                    @endif
                                    <span class="ml-4">

                                          {{$result['title']}}

                                    </span>
                                </a>
                            </li>

                        @endforeach
                    @else
                        @if(strlen($search) > 2)
                             <div class="p-4">No Results For {{$search}}</div>
                        @endif
                    @endif
                </ul>
        </div>

</div>
