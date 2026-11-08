<?php

use Livewire\Component;
use App\Models\Todo;
use App\TodoPriority;

new class extends Component {
    public array $priorities;

    public $priority;
    public $title;
    public $description;


    public function __construct()
    {
        $this->priorities = TodoPriority::cases();
    }

    public function save()
    {
        $validated = $this->validate([
            'priority' => ['required', 'in:' . implode(',', array_column($this->priorities, 'value'))],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        Todo::create($validated + ['user_id' => auth()->id()]);

        return redirect()
            ->route('todos.index')
            ->with('success', 'Todo created successfully.');
    }
};
?>

<div>
    <h1 class="my-3 text-2xl text-semibold">Create new todo</h1>
    <form wire:submit="save">
        <div>
            <label for="priority-0">Priority:</label>

            @foreach ($priorities as $index => $priority)
                <input wire:model="priority" type="radio" id="priority-{{ $index }}" name="priority"
                    value="{{ $priority }}" />
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

        <button type="submit" class="border px-2 py-1">Create</button>
        <a href="{{ route('todos.index') }}" class="border px-2 py-1">Cancel</a>
    </form>
</div>