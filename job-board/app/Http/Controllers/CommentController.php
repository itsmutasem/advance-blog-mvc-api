<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $data = Comment::all();
        return view('comment.index', ['comments' => $data, 'pageTitle' => 'Blog']);
    }

    public function create()
    {
        return view('comment.create', ['pageTitle' => 'Blog - Create New Comment']);
    }

    public function store(BlogCommentRequest $request)
    {
        $post = Post::findOrFail($request->input('post_id'));

        $comment = new Comment();

        $comment->author = $request->input('author');
        $comment->content = $request->input('content');
        $comment->post_id = $request->input('post_id');

        $comment->save();

        return redirect("/blog/{$post->id}")->with('store', 'Comment added successfully!');
    }

    public function show(string $id)
    {
        $comment = Comment::findOrFail($id);
        return view('comment.show', ['comment' => $comment, 'pageTitle' => "Comment - ".$comment->content]);
    }

    public function edit(string $id)
    {
        $comment = Comment::findOrFail($id);
        return view('comment.edit', ['comment' => $comment, 'pageTitle' => 'Blog - Edit Comment']);
    }

    public function update(Request $request, Comment $comment)
    {
        //
    }

    public function destroy(Comment $comment)
    {
        //
    }
}
