<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => 'https://picsum.photos/'.$this->faker->numberBetween(450,500).'.jpg',
            'title' => $this->faker->unique()->text(75),
            'slug' => $this->faker->slug(),
            'category_id' => $this->faker->numberBetween(1,30),
            'user_id' => '1',
            'views' => $this->faker->numberBetween(9,2500),
            'article' => $this->faker->paragraph(100),
            'status' => true,
            'created_at' => now()
        ];
    }
}
