<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
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
            "category_id" => mt_rand(1, 3),
            "user_id" => mt_rand(1, 4),
            "title" => $this->faker->sentence(mt_rand(2, 6)),
            "slug" => $this->faker->unique()->slug(mt_rand(2, 6)),
            "excerpt" => $this->faker->paragraph(),
            "body" => collect($this->faker->paragraphs(mt_rand(10, 20)))
                ->map(fn ($p) => "<p>$p</p>")
                ->implode(''),
        ];
    }
}
