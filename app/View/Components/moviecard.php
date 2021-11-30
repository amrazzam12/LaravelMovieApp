<?php

namespace App\View\Components;

use Illuminate\View\Component;

class moviecard extends Component
{
   public $movie;
   public $genres;


    public function __construct($movie , $genres)
    {
        $this->movie = $movie;
        $this->genres = $genres;
    }


    public function render()
    {
        return view('components.moviecard');
    }
}
