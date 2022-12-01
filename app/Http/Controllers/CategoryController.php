<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Butschster\Head\Contracts\MetaTags\MetaInterface;
use Butschster\Head\Facades\Meta;
use Illuminate\View\View;

class CategoryController extends Controller
{
    protected $meta;

    public function __construct(MetaInterface $meta)
    {
        $this->meta = $meta;
    }

    public function index():View
    {
        $categories = Category::all();

        $this->meta
            ->setTitle('Categories')
            ->setDescription('Blog categories')
            ->setCanonical(url()->current());

        return view('categories.index', compact('categories'));
    }

    public function show(Category $category):View
    {
        $this->meta
            ->setTitle($category->meta_title ?? $category->name)
            ->setDescription($category->meta_description ?? $category->name)
            ->setCanonical(url()->current());

        $posts = $category->posts()->paginate(10)->withQueryString();

        return view('categories.show', compact('category', 'posts'));
    }
}
