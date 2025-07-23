<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $data = Tag::all();
        return view('tag.index', ['tags' => $data, 'pageTitle' => 'Tags']);
    }

    public function create()
    {
        return view('tag.create', ['pageTitle' => 'Blog - Create New Tag']);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Tag $tag)
    {
        //
    }

    public function edit(string $id)
    {
        $tag = Tag::findOrFail($id);
        return view('tag.edit', ['tag' => $tag, 'pageTitle' => 'Edit Tag']);
    }

    public function update(Request $request, Tag $tag)
    {
        //
    }

    public function destroy(Tag $tag)
    {
        //
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
