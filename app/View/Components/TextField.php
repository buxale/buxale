<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TextField extends Component
{
    public $title;
    public $name;
    /**
     * @var string
     */
    public $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null, $name, $type = 'text')
    {
        $this->title = $title;
        $this->name = $name;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.text-field');
    }
}
