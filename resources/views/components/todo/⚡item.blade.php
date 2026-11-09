<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\Todo;
use App\TodoStatus;

new class extends Component
{
    public Todo $todo;
    public $isCompleted = false;

    public function mount(Todo $todo)
    {
        $this->todo = $todo;
        $this->isCompleted = $this->completed();
    }

    #[Computed]
    public function completed()
    {
        return $this->todo->status === TodoStatus::COMPLETED;
    }

    public function changeStatus($id = null)
    {
        $id = $id ?? $this->todo->id;
        $todo = Todo::findOrFail($id);

        $todo->status = $todo->status === TodoStatus::COMPLETED ? TodoStatus::PENDING : TodoStatus::COMPLETED;
        $todo->save();
        $this->isCompleted = $todo->status === TodoStatus::COMPLETED;
    }

    public function deleteTodo($id)
    {
        $todo = auth()->user()->todos()->findOrFail($id);
        $todo->delete();
        
        return redirect()
            ->route('todos.index')
            ->with('status', 'Removed!');
    }
};
?>

<li>
    <input
        type="checkbox"
        id="todo-{{ $todo->id }}"
        {{ $this->completed ? 'checked' : '' }}
        wire:change="$js.complete"
    />
    <label
        for="todo-{{ $todo->id }}"
        :class="$wire.isCompleted ? 'line-through' : ''"
    >
        {{ $todo->title }}
    </label>

    <button
        wire:confirm="Are you sure?"
        wire:click="deleteTodo({{ $todo->id }})"
        class="text-red-500">x</button>
</li>

<script>
    this.$js.complete = () => {
        $wire.isCompleted = !$wire.isCompleted

        $wire.changeStatus()
    }
</script>
