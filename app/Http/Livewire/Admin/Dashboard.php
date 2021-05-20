<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Dashboard extends Component
{
    public $tab = 'user';
    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
