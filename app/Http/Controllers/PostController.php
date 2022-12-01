<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index():View
    {
        $posts = Post::query()
            ->with('media', 'category')
            ->paginate(10)
            ->withQueryString();

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post):View
    {
        return view('posts.show', compact('post'));
    }
}
