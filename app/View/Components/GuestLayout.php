<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GuestLayout extends Component
{
    public $title;
    public function __construct($title = 'Laravel')
    {
        $this->title = $title;
    }

    public function render(): View|Closure|string
    {
        return view('layouts.guest');
    }
}
