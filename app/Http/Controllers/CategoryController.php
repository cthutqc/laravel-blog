<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index():View
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function show(Category $category):View
    {
        $posts = $category->posts()->paginate(10)->withQueryString();

        return view('categories.show', compact('category', 'posts'));
    }
}
