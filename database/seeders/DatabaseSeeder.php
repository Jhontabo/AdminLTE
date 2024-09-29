<?php

namespace Database\Seeders;

use App\Models\User;

use App\Models\Category;

use App\Models\Tag;

use App\Models\Post;
use Illuminate\Contracts\Cache\Store;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');

        $this->call(UserSeeder::class);
        Category::factory(4)->create();
        Tag::factory(8)->create();
        Post::factory(100)->create();
        $this->call(PostSeeder
        ::class);
    }
}
