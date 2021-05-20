<?php

namespace App\Http\Livewire\Posts;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Reply;
use Livewire\Component;
use Spatie\Tags\Tag;

class ShowPost extends Component
{
    public $post_id;
    public $post;
    public $comments;
    public $replies = [];
    public $replyModal = false;
    public $comment_text;
    public $reply_text;
    public $selected_comment;
    public $tags;
    public $selectedTag = [];


    public function mount(){
        $this->tags = Tag::orderBy('created_at','desc')->take(8)->get();
        $this->post = Post::with('comments','tags','user')->findOrFail($this->post_id);
        $this->comments = $this->post->comments;
        if(auth()->user()->status == 'Basic' && $this->post->type == 'Pro'){
            abort(403);
        }
    }

    public function render()
    {

            return view('livewire.posts.show-post');
    }

    public function postComment(){
        $this->validate([
            'comment_text' => 'required|string',
        ]);
        $new_comment = new Comment();
        $new_comment->comment = $this->comment_text;
        $new_comment->post_id = $this->post_id;
        $new_comment->user_id = auth()->id();
        $new_comment->save();
        $this->reset('comment_text');
        $this->mount();
    }
    public function postReply(){
        $this->validate([
            'reply_text' => 'required|string',
        ]);
        $new_reply = new Reply();
        $new_reply->reply = $this->reply_text;
        $new_reply->comment_id = $this->selected_comment->id;
        $new_reply->user_id = auth()->id();
        $new_reply->save();
        $this->reset('reply_text');
        $this->mount();
        $this->replies = $this->selected_comment->replies()->with('user')->get();
    }

    public function getReplies(Comment $comment){
        $this->replyModal = true;
        $this->selected_comment = $comment;
        $this->replies = $comment->replies()->with('user')->get();
    }
}
