<?php

namespace App\Livewire;

use Livewire\Component;

class Sample extends Component
{
    /**
     * Primitive Data types
     */
    public $todos2 = []; // Array
 
    public $todo2 = ''; // String
 
    public $maxTodos = 10; // Integer
 
    public $showTodos = false; // Boolean

    public $todoFilter; // Null



    public array $todos = [
        'sample1',
        'sample2',
    ];
    public string $todo = '';

    public function add()
    {
        $this->todos[] = $this->todo;

        $this->todo = '';
        // OR reset to the original value that is '' at line#10
        // $this->reset('todo');
    }

    public function render()
    {
        return view('livewire.sample');
    }
}
