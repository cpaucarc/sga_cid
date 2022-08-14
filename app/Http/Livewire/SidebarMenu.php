<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SidebarMenu extends Component
{
    public $logout = false;

    public function render()
    {
        return view('livewire.sidebar-menu');
    }
}
