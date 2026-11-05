<?php

namespace App\Livewire\Posts;

use App\Models\Post;
// use Livewire\Attributes\Layout;
use Livewire\Component;

// 2nd way for layout
// #[Layout('layouts.guest')]
class Index extends Component
{
    // 1st way for layout
    // #[Layout('layouts.guest')]
    public function render()
    {
        $posts = Post::with('author')->paginate();

        return view('livewire.posts.index', compact('posts'))
        // 3rd way for layout
            // ->layout('layouts.guest')
        ;
    }
}
