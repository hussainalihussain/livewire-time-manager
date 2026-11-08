<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class Edit extends Component
{
    public Post $post;
    public $title;

    public function mount(?Post $post)
    {
        if (!$post) {
            return redirect()
                ->route('posts.index')
                ->with('status', 'No post found');
        }

        $this->post = $post;

        $this->fill(
            $post->only('title')
        );
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
        return view('livewire.posts.edit');
    }
}
