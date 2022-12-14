<?php

namespace App\Http\Controllers;

use Abordage\LastModified\Facades\LastModified;
use App\Models\Post;
use Butschster\Head\Facades\Meta;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index():View
    {
        Meta::setTitle('Posts')
            ->setDescription('Blog posts')
            ->setCanonical(url()->current());

        $posts = Post::query()
            ->paginate(10)
            ->withQueryString();

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post):View
    {
        Meta::setTitle($post->meta_title ?? $post->name)
            ->setDescription($post->meta_description ?? $post->name)
            ->setCanonical(url()->current());

        LastModified::set($post->updated_at);

        $post->viewCount();

        return view('posts.show', compact('post'));
    }
}
