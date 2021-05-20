<?php

namespace App\Http\Livewire\Posts;

use App\Models\Pair;
use App\Models\Post;
use Livewire\Component;

class CreatePost extends Component
{
    protected $queryString = ['post_id'];
    public $post_id;
    public $type;
    public $strategy;
    public $status;
    public $timeframe;
    public $chart_link;
    public $image_link;
    public $description;
    public $disclaimer;
    public $tags;
    public $pair_id;
    public $editing = false;
    public $edit_post;

    protected $rules = [
        'type' => 'required',
        'strategy' => 'required',
        'status' => 'required',
        'timeframe' => 'required',
        'chart_link' => 'url',
        'image_link' => 'url',
        'description' => 'required',
        'disclaimer' => 'required',
        'tags' => 'required',
        'pair_id' => 'required',
    ];
    public function mount()
    {
        if ($this->post_id) {
            $this->edit_post = Post::findOrFail($this->post_id);
            $this->type = $this->edit_post->type;
            $this->strategy = $this->edit_post->strategy;
            $this->status = $this->edit_post->status;
            $this->timeframe = $this->edit_post->timeframe;
            $this->chart_link = $this->edit_post->chart_link;
            $this->image_link = $this->edit_post->image_link;
            $this->description = $this->edit_post->description;
            $this->disclaimer = $this->edit_post->disclaimer;
            $this->tags = implode(',',$this->edit_post->tags->pluck('name')->toArray());
            $this->pair_id = $this->edit_post->pair->id;
            $this->editing = true;
        }
    }
    public function render()
    {
        return view('livewire.posts.create-post')->with('pairs',Pair::all());
    }

    public function savePost(){
        $tag_array = explode(',',$this->tags);
        $validated_values = $this->validate();
        unset($validated_values['tags']);
        $validated_values['published_at'] = now();
        $validated_values['user_id'] = auth()->id();
        $validated_values['tags'] = $tag_array;
        if ($this->editing) {
            $post = $this->edit_post->update($validated_values);
        } else {
            $post = Post::create($validated_values);
        }
        $this->redirect(route('dashboard'));
    }
}
