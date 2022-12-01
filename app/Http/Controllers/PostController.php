<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Butschster\Head\Contracts\MetaTags\MetaInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    protected $meta;

    public function __construct(MetaInterface $meta)
    {
        $this->meta = $meta;
    }

    public function index():View
    {
        $this->meta
            ->setTitle('Posts')
            ->setDescription('Blog posts')
            ->setCanonical(url()->current());

        $posts = Post::query()
            ->with('media', 'category')
            ->paginate(10)
            ->withQueryString();

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post):View
    {
        $this->meta
            ->setTitle($post->meta_title ?? $post->name)
            ->setDescription($post->meta_description ?? $post->name)
            ->setCanonical(url()->current());

        return view('posts.show', compact('post'));
    }
}
