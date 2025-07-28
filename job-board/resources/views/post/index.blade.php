<x-layout :title="$pageTitle">
    @if(session('success'))
        <div class="bg-green-50 px-3 py-2">
            {{ session('success') }}
        </div>
    @endif
    <div class="mt-6 flex items-center justify-end gap-x-6">
        <a href="/blog/create" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</a>
    </div>
        @foreach($posts as $post)
            <div class="bg-white rounded-lg shadow-md p-6 mb-6 border border-gray-200 mt-2">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-2xl">{{ $post->title }}</h2>
                        <p class="text-1xl text-gray-600">{{ $post->author }}</p>
                    </div>
                    <div class="mt-4">
                        <a href="blog/{{ $post->id }}/edit" class="text-blue-500 hover:text-gray-500">Edit</a>
                        <button class="text-red-500 hover:text-gray-500 ml-4">Delete</button>
                    </div>
                </div>
            </div>
        @endforeach
    {{ $posts->links() }}
</x-layout>
