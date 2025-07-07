<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function index()
    {
        // Eloquent ORM -> Get all data
        $data = Comment::all();
        return view('comment.index', ['comments' => $data, 'pageTitle' => 'Blog']);
    }

    function create()
    {
        Comment::create([
            'author' => 'Mutasem',
            'content' => 'This is a another test comment',
            'post_id' => 2
        ]);
        return redirect('/comments');
    }
}
