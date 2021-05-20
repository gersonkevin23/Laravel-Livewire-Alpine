<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\View\Component;

class DashboardRightside extends Component
{
    public $trendingPosts;
    public function __construct()
    {
        $this->trendingPosts = Post::trending();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard-rightside');
    }
}
