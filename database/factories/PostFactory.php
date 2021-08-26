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
            'image' => '/website/images/posts/seeding/image-'.$this->faker->numberBetween(1,30).'.jpg',
            'title' => $this->faker->text(75),
            'slug' => $this->faker->slug(),
            'category_id' => $this->faker->numberBetween(1,30),
            'user_id' => $this->faker->numberBetween(1,5),
            'views' => $this->faker->numberBetween(9,2500),
            'article' => $this->faker->paragraph(500),
            'status' => true,
            'created_at' => now()
        ];
    }
}
