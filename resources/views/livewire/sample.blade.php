<div>
    <div>
        <input type="text" wire:model.live="todo" placeholder="Todo...">

        <button wire:click="add" x-text="'Add Todo'"></button>
    </div>
    <div>
        The length of todos <strong x-text="$wire.todos.length"></strong>
        <br />
        We can see the length using this way too: <strong x-text="$wire.get('todos').length"></strong>

        <div>
            <button x-on:click="$wire.todo=''">Clear</button>
        </div>
        <div>
            <button x-on:click="$wire.set('todo', '')">Clear</button>
        </div>
        <div>
            <button wire:click="$set('todo', '123')">Set to 123</button>
        </div>
        <div>
            <button wire:click="$set('todo', '456')">Set to 456</button>
        </div>
    </div>
    <h2 class="my-2 text-xl text-semibold">Todos list</h2>
    <ul>
        @foreach ($todos as $index => $todo)
            <li>{{ $todo }}</li>
        @endforeach
    </ul>
</div>