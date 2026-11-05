<div class="main-container p-5">
    <div class="flex justify-between items-center">
        <h1 class="mb-3 text-2xl font-semibold">All Posts</h1>
        <a href="{{ route('posts.create') }}"
            class="px-1.5 py-0.5 border rounded text-gray-700 bg-gray-100 shadow-sm transition-all hover:text-gray-900 hover:bg-gray-200">Add
            New</a>
    </div>

    @foreach ($posts as $post)
        <livewire:posts.single-post :post="$post" :key="$post->id" />
    @endforeach
</div>