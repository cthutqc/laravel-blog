<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TagController extends Controller
{
    public function index():View
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    public function show(Tag $tag):View
    {
        $posts = Post::whereHas('tags', function ($q) use($tag){
            $q->where('id', $tag->id);
        })->paginate(10)->withQueryString();

        return view('tags.show', compact('tag', 'posts'));
    }
}
