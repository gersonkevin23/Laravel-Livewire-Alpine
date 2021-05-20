<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\UserPostsSubscriptions;
use Livewire\Component;
use Spatie\Tags\Tag;

class Dashboard extends Component
{
    protected $queryString = ['from', 'q'];
    public $from;
    public $q;
    public $posts;
    public $tags;
    public $tab = 'Active';
    public $selectedTag = [];

    public function mount()
    {

        if (isset($this->q)) {
            request()->flash();
            $this->posts = Post::search($this->q)->active()->with('comments', 'tags', 'user')->orderBY('published_at', 'desc')->get();
        } else {
            $this->posts = Post::active()->with('comments', 'tags', 'user')->orderBY('published_at', 'desc')->get();
        }
        $this->tags = Tag::orderBy('created_at', 'desc')->take(8)->get();
    }

    public function render()
    {
        if (auth()->user()->hasRole('Super Admin') && !$this->from) {
            $this->redirect(route('admin-dashboard'));
        }
        return view('dashboard');
    }

    public function postDetails(Post $post)
    {
        if ($post->type == 'Pro' && auth()->user()->status == 'Basic') {
            session()->flash('flash.banner', 'Please upgrade your membership to view this post.!');
            session()->flash('flash.bannerStyle', 'danger');
        } else {
            $this->redirect(route('show-post', $post));
        }
    }

    public function setTab($tabName)
    {
        $this->tab = $tabName;
        $post = Post::with('comments', 'tags', 'user');
        if (isset($this->q)) {
            $post = $post->search($this->q);
        }
        if ($this->selectedTag) {
            $post = $post->withAnyTags([$this->selectedTag]);
        }
        if ($tabName == 'Active') {
            $post = $post->active();
        } elseif ($tabName == 'Closed') {
            $post = $post->closed();
        } elseif ($tabName == 'Cancelled') {
            $post = $post->cancelled();
        }
        $this->posts = $post->with(['comments', 'tags', 'user'])->orderBY('published_at', 'desc')->get();
    }

    public function filterByTag(Tag $tag)
    {
        $this->selectedTag = ($this->selectedTag == $tag) ? [] : $tag;
        $this->setTab($this->tab);
    }

    public function subscribeToPost(Post $post)
    {
        if ($post->type == 'Pro' && auth()->user()->status == 'Basic') {
            session()->flash('flash.banner', 'Please upgrade your membership to subscribe for this post.!');
            session()->flash('flash.bannerStyle', 'danger');
        } else {
            $subscriptions = UserPostsSubscriptions::updateOrCreate([
                'user_id' => auth()->id(),
                'post_id' => $post->id,
            ]);
            if($subscriptions){
                session()->flash('flash.banner', 'Subscription to post successful.!');
                session()->flash('flash.bannerStyle', 'success');
            }
        }
    }

    public function tabChanged(){
        $this->setTab($this->tab);
    }

}
