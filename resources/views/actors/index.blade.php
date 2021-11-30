@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 py-16">
        <div class="popular-actors">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Actors</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($popularActors as $actor)
                    <div class="actor mt-8">
                        <a href="{{route('actors.show' , $actor['id'])}}">
                            @if($actor['profile_path'] !== null)
                                 <img src="{{ 'https://image.tmdb.org/t/p/w500' . $actor['profile_path']}}" alt="profile image" class="hover:opacity-75 transition ease-in-out duration-150">
                            @else
                                 <img src="https://via.placeholder.com/500" alt="profile image" class="hover:opacity-75 transition ease-in-out duration ">
                            @endif
                        </a>
                        <div class="mt-2">
                            <a href="{{route('actors.show' , $actor['id'])}}" class="text-lg hover:text-gray-300">{{$actor['name']}}</a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div> <!-- end popular-actors -->



    </div>
@endsection
