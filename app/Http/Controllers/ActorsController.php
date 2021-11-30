<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ActorsController extends Controller
{
    public function index() {

        $people = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/popular')
            ->json()['results'];


        return view('actors.index' , [

            'popularActors' => $people

        ]);
    }

    public function show($id) {
        $actor = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/' . $id)
            ->json();

        $social = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/' . $id . '/external_ids')
            ->json();

        $credits =  Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/' . $id .'/movie_credits')
            ->json()['cast'];


        $knownFor = collect($credits)->sortBy('popularity' , SORT_DESC ,true)->take(5);


        return view('actors.show' , [
            'actor' => $actor,
            'social' => $social,
            'credits' => $credits,
            'knownFor' => $knownFor
        ]);

    }
}
