<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    public function index()
    {
        $data = Post::paginate(15);
        return response($data, 200);
    }

    public function store(Request $request)
    {
        $data = Post::create($request->all());
        return response($data, 201);
    }

    public function show(string $id)
    {
        $data = Post::find($id);
        return response($data, 200);
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
