<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (!file_exists(storage_path('app/public/posts'))) {
            mkdir(storage_path('app/public/posts'), 0777, true);
        }

        return [
            //

            'url' => 'posts/' . $this->faker->image('public/storage/posts', 300, 300, null, false)
        ];
    }
}
