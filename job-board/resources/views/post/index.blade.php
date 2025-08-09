<x-layout :title="$pageTitle">
    @php
        $userRole = auth()->user()->role;
    @endphp
    @if(session('store'))
        <div class="flex items-center bg-green-100 border border-green-300 text-green-800 text-sm rounded-md px-4 py-3 mb-4" role="alert">
            <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="font-medium">Success:</span> <span class="ml-1">{{ session('store') }}</span>
        </div>
    @elseif(session('update'))
        <div class="flex items-center bg-blue-100 border border-blue-300 text-blue-800 text-sm rounded-md px-4 py-3 mb-4" role="alert">
            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M12 20h.01M12 4v12" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="font-medium">Updated:</span> <span class="ml-1">{{ session('update') }}</span>
        </div>
    @elseif(session('delete'))
        <div class="flex items-center bg-red-100 border border-red-300 text-red-800 text-sm rounded-md px-4 py-3 mb-4" role="alert">
            <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="font-medium">Deleted:</span> <span class="ml-1">{{ session('delete') }}</span>
        </div>
    @endif
    @if($userRole == 'admin')
        <div class="mt-6 flex items-center justify-end gap-x-6">
        <a href="/blog/create" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Create
        </a>
        </div>
    @endif
        @foreach($posts as $post)
            <div class="bg-white rounded-lg shadow-md p-6 mb-6 border border-gray-200 mt-2">
                <div class="flex justify-between items-center">
                    <div>
                        <a href="/blog/{{ $post->id }}"><h2 class="text-2xl">{{ $post->title }}</h2></a>
                        <p class="text-1xl text-gray-600">{{ $post->author }}</p>
                    </div>
                    <div class="flex items-center gap-x-4 mt-4">
                        @if(in_array($userRole, ['admin', 'editor']))
                        <a href="/blog/{{ $post->id }}/edit" class="text-blue-500 hover:text-gray-500">Edit</a>
                        @endif
                        @if($userRole == 'admin')
                            <form method="POST" action="/blog/{{ $post->id }}" onsubmit="return confirm('Are you sure, this cannot be reversed?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 hover:text-gray-500">Delete</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    {{ $posts->links() }}
</x-layout>
