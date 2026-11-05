<?php

namespace App\Livewire\Posts;

use Livewire\Component;

class FruitItem extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.posts.fruit-item');
    }
}
