<?php

use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::guest')]
    class extends Component {
    public $todos = [];

    public function __construct()
    {
        $this->todos = auth()->user()->todos;
    }
};
?>

<div class="py-5 mx-auto max-w-3xl">
    <header class="flex justify-between items-center py-3">
        <h1 class="text-2xl">Todos</h1>
        <a href="{{ route('todos.create') }}">Create</a>
    </header>
    <main>
        <ul>
            @forelse ($todos as $todo)
                <livewire:todo.item :todo="$todo" />
            @empty
                <li class="text-gray-500">You have no todos!</li>
            @endforelse
        </ul>
    </main>
</div>