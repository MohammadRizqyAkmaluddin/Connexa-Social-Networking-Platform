<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ButtonMain extends Component
{
    public $provider;

    public function __construct($provider = null)
    {
        $this->provider = strtolower($provider);
    }

    public function render()
    {
        return view('components.button-main');
    }
}

