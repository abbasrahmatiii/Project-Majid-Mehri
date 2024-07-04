<?php
// database/factories/PostFactory.php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'summary' => $this->faker->paragraph,
            'slug' => $this->faker->slug,
            'image' => null,
            'category_id' => Category::factory(),
            'user_id' => User::factory(),
            'published' => $this->faker->boolean,
            'views' => $this->faker->numberBetween(0, 1000),
        ];
    }
}
