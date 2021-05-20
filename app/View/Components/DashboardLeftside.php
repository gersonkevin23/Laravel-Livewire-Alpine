<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardLeftside extends Component
{
    public $tags;
    public $selectedTag;

    public function __construct($tags,$selectedTag)
    {
        $this->tags = $tags;
        $this->selectedTag = $selectedTag;
    }

    public function render()
    {
        return view('components.dashboard-leftside');
    }
}
