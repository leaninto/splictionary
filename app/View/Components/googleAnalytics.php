<?php

namespace App\View\Components;

use Illuminate\View\Component;

class googleAnalytics extends Component
{
    public $googleTrackingCode;
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct($googleTrackingCode)
    {
        $this->googleTrackingCode = $googleTrackingCode;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        if(env("APP_ENV") == "production"){
            
            return view('components.google-analytics');
        }else{
            return null;
        }
    }
}
