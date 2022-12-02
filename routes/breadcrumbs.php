<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('pages.home'));
});

Breadcrumbs::for('categories', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Categories', route('categories.index'));
});
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category){
    $trail->parent('categories');
    $trail->push($category->name, route('categories.show', $category));
});
Breadcrumbs::for('posts', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('posts', route('posts.index'));
});
Breadcrumbs::for('post', function (BreadcrumbTrail $trail, $post) {
    $trail->parent('home');
    $trail->push($post->category->first()->name, route('categories.show', $post->category->first()));
    $trail->push($post->name, route('posts.show', $post));
});
Breadcrumbs::for('tags', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Tags', route('tags.index'));
});
Breadcrumbs::for('tag', function (BreadcrumbTrail $trail, $tag) {
    $trail->parent('tags');
    $trail->push($tag->name, route('tags.show', $tag));
});
