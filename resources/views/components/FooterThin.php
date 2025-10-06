<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FooterThin extends Component
{
    public $fixedBottom;

    public function __construct($fixedBottom = false)
    {
        $this->fixedBottom = $fixedBottom;
    }

    public function render()
    {
        return view('components.footer-thin');
    }
}
