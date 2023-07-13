<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1, 6),
            'title' => fake()->unique()->sentence(),
            'slug' => fake()->unique()->slug(),
            'excerpt' => fake()->paragraph,
            'body' => '<p>' . implode('</p><p>', fake()->paragraphs(rand(6, 15))) . '</p>',
            'published' => fake()->boolean,
        ];
    }
}
