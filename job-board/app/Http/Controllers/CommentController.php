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
        return view('comment.index', ['Comments' => $data, 'pageTitle' => 'Blog']);
    }

    function create()
    {
        Comment::create([
            'author' => 'Mutasem',
            'content' => 'This is a test comment',
            'post_id' => 3
        ]);
        return redirect('/blog');
    }
}
