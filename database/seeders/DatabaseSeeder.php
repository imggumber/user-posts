<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory(1000)->create();
        Post::factory(50000)->make()->each(function($post) use ($users) {
            $post->user_id = $users->random()->id;
            $post->save();
        });

    }
}
