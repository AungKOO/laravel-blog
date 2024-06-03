<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory()->create([
            "name" =>'Alice',
            "email" => 'alice@email.com'
        ]);
        User::factory()->create([
            "name" =>'bob',
            "email" => 'bob@email.com'
        ]);
        Article::factory()->count(30)->create();
        Category::factory()->count(5)->create();
        Comment::factory()->count(40)->create();


    }
}
