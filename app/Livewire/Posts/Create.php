<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class Create extends Component
{
    public $title;

    public function mount($title = null)
    {
        $this->title = $title;
    }

    public function save()
    {
        Post::create([
            'title' => $this->title,
            'author_id' => Auth::id()
        ]);

        return redirect()->to('/posts')
            ->with('status', 'Post created!');
    }

    #[Title('Create Post')]
    public function render()
    {
        return view('livewire.posts.create');
    }
}
