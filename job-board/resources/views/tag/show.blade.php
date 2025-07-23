<x-layout :title="$pageTitle">
    <h2>Tag: {{ $tag->title }}</h2>
    <h3>Related Posts</h3>
    <ul>
        @forelse($tag->posts -> $post)
            <li>
                <strong>{{ $post->title }}</strong>
                <p>{{ $post->body }}</p>
                <p>Author: {{ $post->author }}</p>
                <a href="{{ route('blog.show', $post->id) }}">View Full Post</a>
            </li>
            @empty
                <p>No related are associated with this tag.</p>
        @endforelse
    </ul>
</x-layout>
