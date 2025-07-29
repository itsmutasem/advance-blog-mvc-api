<x-layout :title="$pageTitle">
    <div>
        <div class="px-4 sm:px-0 mt-5">
            <form method="POST" action="/comments/{{ $comment->id }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="post_id" value="{{ $comment->post->id }}" />
                <div class="space-y-6 bg-white rounded-lg shadow-md px-6 py-4 mb-4 border border-gray-200">
                    <h2 class="text-base font-semibold text-gray-900">Edit comment: {{ $comment->content }}</h2>
                    <div>
                        <div class="grid grid-cols-1 gap-x-4 gap-y-4 sm:grid-cols-6">

                            <div class="sm:col-span-6">
                                <label for="author" class="block text-sm font-medium text-gray-900">Your Name</label>
                                <div class="mt-1">
                                    <div class="mt-1">
                                        <input id="author" type="text" name="author" value="{{ old('author', $comment->author) }}" class=" {{ $errors->has('author') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
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
                                        {{ old('content', $comment->content) }}
                                    </textarea>
                                </div>
                                @error('content')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4 flex items-center justify-end gap-x-4">
                            <button type="submit" class="rounded-md bg-indigo-600 px-4 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                Update comment
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout>
