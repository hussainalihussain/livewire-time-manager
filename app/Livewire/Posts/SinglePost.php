<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class SinglePost extends Component
{
    public Post $post;

    public function mount(?Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.posts.single-post');
    }
}
