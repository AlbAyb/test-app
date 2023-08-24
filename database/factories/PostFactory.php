<?php

namespace Database\Factories;

use Dotenv\Util\Str;
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
        $title = $this->faker->sentence(6, true);
//        $slug = Str::substr(Str::lower(preg_replace('/\s+/', '-', $title)), 0, -1);
        $slug = preg_replace('/\s+/', '-', $title);
        return [
            'title' => $title,
            'content' => $this->faker->paragraph(150, true),
            'slug' => $slug,
            'img' => 'https://klike.net/uploads/posts/2019-11/1574514215_2.jpg',
            'created_at' => $this->faker->dateTimeBetween('-1 years'),
        ];
    }
}
