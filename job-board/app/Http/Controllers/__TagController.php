<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    function index()
    {
        $data = Tag::all();
        return view('tag.index', ['tags' => $data, 'pageTitle' => 'Tags']);
    }

    function create()
    {
        Tag::create([
            'title' => 'CSS'
        ]);
        return redirect('/tags');
    }

    function testManyToMany()
    {
        $tag = Tag::find(2);
        $tag->posts()->attach([4]);
        return response()->json([
            'tag' => $tag->title,
            'posts' => $tag->posts
        ]);
    }
}
