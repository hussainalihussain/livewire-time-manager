<div class="flex justify-between mb-2 rounded p-1.5 shadow">
    <div>
        <h2>{{ $post->title }}</h2>
        <author>{{ $post->author?->name }}</author>
    </div>
    <div>
        <a href="update-posts/{{ $post->id }}"
            class="px-1.5 py-0.5 border rounded text-gray-700 bg-gray-100 shadow-sm transition-all hover:text-gray-900 hover:bg-gray-200">Edit</a>
        <a href="posts/{{ $post->id }}"
            class="px-1.5 py-0.5 border rounded text-gray-700 bg-gray-100 shadow-sm transition-all hover:text-gray-900 hover:bg-gray-200">Show</a>
    </div>
</div>