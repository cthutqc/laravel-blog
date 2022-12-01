<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Butschster\Head\Facades\Meta;
use Illuminate\View\View;

class TagController extends Controller
{

    public function index():View
    {
       Meta::setTitle('Tags')
            ->setDescription('Blog tags')
            ->setCanonical(url()->current());

        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    public function show(Tag $tag):View
    {
        Meta::setTitle($tag->name)
            ->setDescription($tag->name)
            ->setCanonical(url()->current());

        $posts = Post::whereHas('tags', function ($q) use($tag){
            $q->where('id', $tag->id);
        })->paginate(10)->withQueryString();

        return view('tags.show', compact('tag', 'posts'));
    }
}
