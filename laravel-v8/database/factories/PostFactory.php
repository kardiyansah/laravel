<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2, 6)),
            'slug' => $this->faker->slug(),
            'category_id' => mt_rand(1, 4),
            'user_id' => mt_rand(1, 5),
            // 'excerpt' => $this->faker->sentences(mt_rand(5, 10), true),
            'excerpt' => $this->faker->paragraph(),
            // 'body' => $this->faker->paragraphs(mt_rand(3, 5), true),
            'body' => collect($this->faker->paragraphs(mt_rand(5, 8)))->map(fn($paragraph) => "<p>$paragraph</p>")->implode('')
        ];
    }
}
