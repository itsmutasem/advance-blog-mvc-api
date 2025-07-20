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
        Comment::factory(5)->create();
        return response(['message' =>"Successful Creation", 'createdCount' => 5], 201);
    }
}
