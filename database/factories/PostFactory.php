<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(25),
            'text' => $this->faker->realText(),
            'meta_title' => $this->faker->text(55),
            'meta_description' => $this->faker->realText(100),
        ];
    }
}
