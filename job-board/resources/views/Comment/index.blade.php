<x-layout :title="$pageTitle">
    <h2>Comment Exploring (testing)</h2>
    @foreach($comments as $comment)
        <h2 class="text-2xl">{{ $comment->content }}</h2>
        <p>{{ $comment->author }}</p>
        <p>{{ $comment->post }}</p>
    @endforeach
</x-layout>
