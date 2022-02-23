<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Thread>
 */
class ThreadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'category_id' => rand(1,5),
            'title' => $title = str()->title($this->faker->sentence()),
            'slug' => str()->slug($title.'-'.str()->random(6)),
            'body' => $this->faker->paragraph(),
        ];
    }
}
