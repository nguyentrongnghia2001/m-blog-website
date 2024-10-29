<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('post_categories')->insert([
            [
                'name' => 'Business',
                'slug' => 'business'
            ],
            [
                'name' => 'Entertainment',
                'slug' => 'entertainment'
            ],
            [
                'name' => 'Environment',
                'slug' => 'environment'
            ],
            [
                'name' => 'Health',
                'slug' => 'health'
            ],
            [
                'name' => 'Life style',
                'slug' => 'life-style'
            ],
            [
                'name' => 'Politics',
                'slug' => 'politics'
            ],
            [
                'name' => 'Technology',
                'slug' => 'technology'
            ],
            [
                'name' => 'World',
                'slug' => 'world'
            ],
            [
                'name' => 'Post Category 1',
                'slug' => 'post-category-1'
            ],
            [
                'name' => 'Post Category 2',
                'slug' => 'post-category-2'
            ],
        ]);
    }
}
