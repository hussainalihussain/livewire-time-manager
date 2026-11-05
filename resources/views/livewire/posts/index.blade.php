<div class="main-container p-5">
    <div class="flex justify-between items-center">
        <h1 class="mb-3 text-2xl font-semibold">Posts</h1>
        <a href="/create-post"
            class="px-1.5 py-0.5 border rounded text-gray-700 bg-gray-100 shadow-sm transition-all hover:text-gray-900 hover:bg-gray-200">Add
            New</a>
    </div>

    @foreach ($posts as $post)
        <livewire:posts.single-post :post="$post" :key="$post->id" />
    @endforeach

    {{-- <livewire:posts.create-post title="Sample post!" /> --}}
</div>

@assets
<link rel="stylesheet" href="{{ url('css/sample.css') }}">
@endassets

@script
<script>
    setInterval(() => {
        $wire.$refresh()
    }, 15000)
</script>
@endscript