<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class UpdatePost extends Component
{
    public Post $post;
    public $title;

    public function mount(?Post $post)
    {
        $this->post = $post;
        $this->title = $post?->title;
    }

    public function save()
    {
        $this?->post->update([
            'title' => $this->title
        ]);

        return redirect()->to('/posts')
            ->with('status', 'Post updated!');
    }

    public function render()
    {
        return view('livewire.posts.update-post');
    }
}
