<x-layout :title="$pageTitle">
    <div>
        <p>{{ $post->body }}</p>
        <h2 class="text-base font-semibold text-gray-900">Author: {{ $post->author }}</h2>
    </div>
    <div>
        <div class="px-4 sm:px-0 mt-5">
            @if(session('store'))
                <div class="flex items-center bg-green-100 border border-green-300 text-green-800 text-sm rounded-md px-4 py-3 mb-4" role="alert">
                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="font-medium">Success:</span> <span class="ml-1">{{ session('store') }}</span>
                </div>
            @endif
            <form method="POST" action="/comments">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="space-y-6 bg-white rounded-lg shadow-md px-6 py-4 mb-4 border border-gray-200">
                    <h2 class="text-base font-semibold text-gray-900">New comment</h2>

                    <div>
                        <div class="grid grid-cols-1 gap-x-4 gap-y-4 sm:grid-cols-6">

                            <div class="sm:col-span-6">
                                <label for="author" class="block text-sm font-medium text-gray-900">Your Name</label>
                                <div class="mt-1">
                                    <div class="mt-1">
                                        <input id="author" type="text" name="author" value="{{ old('author') }}" class=" {{ $errors->has('author') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                                    </div>
                                    @error('author')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="content" class="block text-sm font-medium text-gray-900">Your Comment</label>
                                <div class="mt-1">
                                    <textarea id="content" name="content" rows="3" class=" {{ $errors->has('content') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                        {{ old('content') }}
                                    </textarea>
                                </div>
                                @error('content')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4 flex items-center justify-end gap-x-4">
                            <button type="submit" class="rounded-md bg-indigo-600 px-4 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                Add comment
                            </button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <h2 class="text-base font-semibold text-gray-900 mt-10">Comments</h2>
        @foreach($post->comments as $comment)
            <div class="mt-6 border-t border-gray-100">
                <dl class="divide-y divide-gray-100 px-4 py-6">
                    <div class="sm:col-span-3">
                        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $comment->content }}</dd>
                        <dt class="text-sm/6 font-medium text-gray-500">— {{ $comment->author }}</dt>
                        <div class="flex items-center justify-end gap-x-4">
                            <a href="/comments/{{ $comment->id }}/edit" class="text-blue-500 hover:text-gray-500">Edit</a>
                        </div>
                    </div>
                </dl>
            </div>
        @endforeach
    </div>

</x-layout>
