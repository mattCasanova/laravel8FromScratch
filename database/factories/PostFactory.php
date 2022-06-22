<?php
namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
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
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => $this->faker->sentence,
            'excerpt' => $this->faker->sentence,
            'body' => '<p>' . $this->faker->paragraph(5) . '</p>' . '<p>' . $this->faker->paragraph(5) . '</p>',
            'slug' => $this->faker->slug
        ];
    }
}