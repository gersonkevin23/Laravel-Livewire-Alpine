<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class ViewPosts extends Component
{

    public $posts;
    public $remove_post;
    public $confirmingPostRemoval = false;

    public function render()
    {
        $this->posts = auth()->user()->posts()->with('comments', 'tags', 'user')->get();
        return view('livewire.posts.view-posts');
    }

    public function destroy($post, $confirm = false)
    {
        if ($confirm == 'no') {
            $this->confirmingPostRemoval = false;
        } elseif ($confirm == 'yes') {
            $this->confirmingPostRemoval = false;
            $this->remove_post->delete();
            $this->mount();
        } else {
            $this->confirmingPostRemoval = true;
            $this->remove_post = Post::find($post);
        }

    }
}
