<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Comment;
use App\Models\Post;
use App\Models\State;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $tags = Tag::factory(10)->create();
        $posts = Post::factory(30)->create();
        $tags_id = $tags->pluck('id');

        $posts->each(function ($post) use ($tags_id) {
            $post->tags()->attach($tags_id->random(3));
            Comment::factory(3)->create([
                'post_id' => $post->id
            ]);
            State::factory(1)->create([
                'post_id' => $post->id
            ]);
        });

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
