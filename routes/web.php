<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $posts = \App\Models\Post::with('category', 'tags')
        ->take(10)
        ->latest()
        ->get();

    return view('pages.home', compact('posts'));
})->name('pages.home');

Route::get('posts', [\App\Http\Controllers\PostController::class, 'index'])
    ->name('posts.index');
Route::get('posts/{post:slug}', [\App\Http\Controllers\PostController::class, 'show'])
    ->name('posts.show');
Route::get('categories', [\App\Http\Controllers\CategoryController::class, 'index'])
    ->name('categories.index');
Route::get('categories/{category:slug}', [\App\Http\Controllers\CategoryController::class, 'show'])
    ->name('categories.show');
Route::get('tags', [\App\Http\Controllers\TagController::class, 'index'])
    ->name('tags.index');
Route::get('tags/{tag:slug}', [\App\Http\Controllers\TagController::class, 'show'])
    ->name('tags.show');
