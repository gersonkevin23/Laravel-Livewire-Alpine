<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminDashboardContent extends Component
{
    public $tab;
    public function __construct($tab)
    {
        $this->tab = $tab;
    }

    public function render()
    {
        return view('components.admin-dashboard-content');
    }
}
