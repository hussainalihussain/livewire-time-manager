<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('All Posts')]
class Index extends Component
{
    public function render()
    {
        $posts = Post::with('author')->paginate();

        return view('livewire.posts.index', compact('posts'));
    }
}
