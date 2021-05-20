<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardContent extends Component
{
    public $posts;
    public $tab;

    public function __construct($posts, $tab)
    {
        $this->posts = $posts;
        $this->tab = $tab;
    }

    public function render()
    {
        return view('components.dashboard-content');
    }
}
