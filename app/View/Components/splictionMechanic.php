<?php

namespace App\View\Components;

use Illuminate\View\Component;

class splictionMechanic extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $firstWordPart;
    public $secondWordPart;
    public $remainder;
    public $spliction;
    
    public function __construct($firstWordPart, $secondWordPart, $spliction)
    {
        $this->firstWordPart = $firstWordPart;
        $this->secondWordPart = $secondWordPart;
        $this->spliction = $spliction;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $remainder = str_replace($this->firstWordPart, "", $this->spliction);
        $remainder = str_replace($this->secondWordPart, "", $remainder);
        return view('components.spliction-mechanic');
    }
}
