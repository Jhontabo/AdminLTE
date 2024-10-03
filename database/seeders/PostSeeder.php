<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $posts = Post::factory(20)->create();

        foreach ($posts as $post) {
            # code...
            Image::factory(1)->create([
                'imageable_id' => $post->id,
                'imageable_type' => Post::class

            ]);
            $post->tags()->attach([
                rand(1, 4),
                rand(5, 8),
            ]);
        }
    }
}
