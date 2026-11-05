<div>
    <form wire:submit="save">
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" wire:model="title" />
        </div>

        <button type="submit">Save</button>
        <a href="{{ route('posts.index') }}">Cancel</a>
    </form>
</div>