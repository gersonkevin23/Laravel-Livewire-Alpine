<?php

namespace App\Http\Livewire\Admin\Post;

use App\Models\Post;
use Livewire\Component;

class Index extends Component
{
    public $posts;
    public $remove_post;
    public $confirmingPostRemoval = false;

    public function render()
    {
        $this->posts = Post::with('comments','tags','user')->get();
        return view('livewire.admin.post.index');
    }

    public function destroy($post,$confirm = false){
        if($confirm == 'yes'){
            $this->confirmingPostRemoval = false;
            $this->remove_post->delete();
            $this->mount();
        }elseif ($confirm == 'no'){
            $this->confirmingPostRemoval = false;
        }else{
            $this->confirmingPostRemoval = true;
            $this->remove_post = Post::find($post);
        }

    }
}
