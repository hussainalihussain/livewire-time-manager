<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\Todo;
use App\TodoPriority;

new class extends Component
{
    public Todo $todo;

    public $priority;
    public $title;
    public $description;

    public function mount()
    {
        if ($this->todo->user_id !== auth()->id()) {
            abort(403, "You are not allowed todo this action!");
        }

        $this->fill([
            'priority' => $this->todo->priority->value,
        ] + $this->todo->only('title', 'description'));
    }

    #[Computed]
    public function priorities()
    {
        return TodoPriority::cases();
    }

    public function save()
    {
        $validated = $this->validate([
            'priority' => ['required', 'in:' . implode(',', array_column($this->priorities(), 'value'))],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        $this->todo->update($validated);

        return redirect()
            ->route('todos.index')
            ->with('success', 'Todo updated successfully.');
    }
};
?>

<div>
    <h1 class="my-3 text-2xl text-semibold">Update todo</h1>
    @dump($todo->status)

    <form wire:submit="save">
        <div>
            <label for="priority-0">Priority:</label>

            @foreach ($this->priorities as $index => $priority)
                <input wire:model="priority" type="radio" id="priority-{{ $index }}" name="priority"
                    value="{{ $priority->value }}" />
                <label for="priority-{{ $index }}">{{ $priority }}</label>
            @endforeach
        </div>
        <div>
            <label for="title">Title:</label>
            <input wire:model="title" type="text" id="title" name="title">
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea wire:model="description" id="description" name="description"></textarea>
        </div>

        <a href="{{ route('todos.index') }}" class="border px-2 py-1">Cancel</a>

        <button wire:loading.remove type="submit" class="border px-2 py-1">Update</button>
        <span wire:loading  class="border border-transparent px-2 py-1">Updating...</span>
    </form>
</div>