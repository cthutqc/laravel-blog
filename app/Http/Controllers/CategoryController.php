<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Butschster\Head\Facades\Meta;
use Illuminate\View\View;

class CategoryController extends Controller
{

    public function index():View
    {
       Meta::setTitle('Categories')
            ->setDescription('Blog categories')
            ->setCanonical(url()->current());

        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function show(Category $category):View
    {
        Meta::setTitle($category->meta_title ?? $category->name)
            ->setDescription($category->meta_description ?? $category->name)
            ->setCanonical(url()->current());

        $posts = $category->posts()->paginate(10)->withQueryString();

        return view('categories.show', compact('category', 'posts'));
    }
}
