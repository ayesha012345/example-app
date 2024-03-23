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
        //   'title' => 'Model Factories',
        //   'excerpt' => 'Excerpt of our first model factory',
        //   'body' => 'content of body',
        //   'image_path' => 'image path',
        //   'is_published' => 1,
        //   'min_to_read' => 2,

'title' => $this->faker->unique()->sentence(),
'excerpt' => $this->faker->realText($maxNbChars =50),
'body' => $this->faker->text(),
'image_path' => $this->faker->imageUrl(640, 480),
'is_published' => 1,
'min_to_read' => $this->faker->numberBetween(1, 10)
        ];
    }
}
