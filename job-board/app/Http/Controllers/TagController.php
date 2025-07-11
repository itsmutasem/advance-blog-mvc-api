<?php

namespace App\Http\Controllers;

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
            'title' => 'Software Engineering'
        ]);
        return redirect('/tags');
    }
}
