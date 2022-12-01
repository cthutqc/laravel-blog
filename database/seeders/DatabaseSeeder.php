<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement("SET foreign_key_checks=0");
        Post::truncate();
        Category::truncate();
        Tag::truncate();
        \DB::statement("SET foreign_key_checks=1");

        $tags = Tag::factory(10)->create();

        Category::factory(5)->has(
            Post::factory(10)
        )->create();

        Post::all()->each(function ($post) use($tags){
            //$imageUrl = fake()->imageUrl(640,480);
            //$post->addMediaFromUrl($imageUrl)->toMediaCollection();
            $post->tags()->attach(rand(1,count($tags)));
        });
    }
}
