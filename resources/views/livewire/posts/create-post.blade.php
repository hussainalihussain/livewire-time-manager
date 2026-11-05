@use('App\Livewire\Posts\FruitItem')

<div>
    <h1>Tile: "{{ $title }}</h1>
    <h2>Var1: {{ $var1 }}</h2>
    <h2>Author: {{ $author }}</h2>

    <form wire:submit="save">
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" wire:model="title" />
        </div>
        {{-- <div>
            <label for="author">Author (Live)</label>
            <input type="text" id="author" wire:model.live="author" />
        </div> --}}

        <button type="submit">Save</button>
        <a href="/posts">Cancel</a>
    </form>
    <ul>
        @foreach ($fruits as $index => $fruit)
            {{-- <li wire:key="{{ $index }}">{{ $fruit }}</li> --}}
            {{-- This way: --}}
            {{-- <livewire:posts.fruit-item :key="$index" :name="$fruit" /> --}}

            {{-- Or this way: --}}
            @livewire(FruitItem::class, ['name' => $fruit], key($index))
        @endforeach
    </ul>
</div>