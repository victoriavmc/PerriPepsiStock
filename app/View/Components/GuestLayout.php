<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    /**
     * Renderizar la vista del componente.
     */
    public function render()
    {
        return view('layouts.guest');
    }
}
