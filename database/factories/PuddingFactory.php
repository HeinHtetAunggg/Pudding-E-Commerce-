<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pudding>
 */
class PuddingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id'=>Category::factory(),
            'name'=>fake()->name(),
            'slug'=>fake()->unique()->slug(),
            'price'=>fake()->randomDigit(),
            'body'=>fake()->paragraph(),
            // 'image'=>'https://i.pravatar.cc/150?u='.fake()->randomNumber(),
            'image'=>'/storage/thumbnails/defaultmenu.jpg',
        ];
    }
}
