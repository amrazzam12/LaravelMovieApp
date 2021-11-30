<?php

namespace App\View\Components;

use Illuminate\View\Component;

class tvshow extends Component
{

    public $show;
    public $genres;

    public function __construct($show , $genres)
    {
        $this->show = $show;
        $this->genres = $genres;
    }


    public function render()
    {
        return view('components.tvshow');
    }
}
