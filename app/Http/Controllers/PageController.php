<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Butschster\Head\Facades\Meta;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Page $page):View
    {
        Meta::setTitle($page->meta_title ?? $page->name)
            ->setDescription($page->meta_description ?? $page->name)
            ->setCanonical(url()->current());

        return view('pages.show', compact('page'));
    }
}
