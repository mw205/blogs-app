<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        Post::factory(500)
            ->recycle($users)
            ->has(
                Comment::factory(3)->state(fn(array $attributes, Post $post) => [
                    'user_id' => $users->random()->id,
                ]),
                "comments"
            )
            ->create();
    }
}
