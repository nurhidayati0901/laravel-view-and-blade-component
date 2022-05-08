<?php

namespace App\View\Components;

use Illuminate\View\Component;

class content_detail extends Component
{
    public $title;
    public $book;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $book)
    {
        //
        $this->$title = $title;
        $this->$book = $book;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.content_detail');
    }
}
