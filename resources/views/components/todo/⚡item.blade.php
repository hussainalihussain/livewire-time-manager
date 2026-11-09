<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\Todo;
use App\TodoStatus;

new class extends Component
{
    public Todo $todo;

    public function mount(Todo $todo)
    {
        $this->todo = $todo;
    }

    #[Computed]
    public function completed()
    {
        return $this->todo->status === TodoStatus::COMPLETED;
    }

    public function changeStatus($id)
    {
        $todo = Todo::findOrFail($id);

        $todo->status = $todo->status === TodoStatus::COMPLETED ? TodoStatus::PENDING : TodoStatus::COMPLETED;
        $todo->save();
        
        return redirect()
            ->route('todos.index')
            ->with('status', 'Status changed!');
    }

    public function deleteTodo($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        
        return redirect()
            ->route('todos.index')
            ->with('status', 'Removed!');
    }

    // Testing
    // public function render()
    // {
    //     return $this->view([
    //         'author' => auth()->user(),
    //     ]);
    // }
};
?>

<li>
    <input
        type="checkbox"
        id="todo-{{ $todo->id }}"
        {{ $this->completed ? 'checked' : '' }}
        wire:change="changeStatus({{ $todo->id }})"
    />
    <label
        for="todo-{{ $todo->id }}"
        class="{{ $this->completed ? 'line-through' : '' }}"
    >
        {{ $todo->title }}
    </label>

    <button wire:click="deleteTodo({{ $todo->id }})" class="text-red-500">x</button>
</li>
